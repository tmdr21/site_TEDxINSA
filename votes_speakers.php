<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

    <?php include('header.php'); ?>

    <body class="concours_speaker" data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>
        
        <div class="bandeau title_bandeau votes_bandeau">
            <ul>
                <li>
                    <div class="caption">
                        <h1><?php echo votes_bandeau?></h1>
                    </div>
                </li>
            </ul>
        </div>

        <section class="container">

			<h1><?php echo votes_title_code?></h1>
			<p><?php echo votes_description?></p>

		</section>
        
        <section class="container">
		
		<script src="js/jquery-2.2.3.min.js"></script>
		<script>
			// --- For web browser --- \\
			function allowDrop(ev) {
				ev.preventDefault();
			}

			function drag(ev) {
				ev.dataTransfer.setData("img", ev.target.id);
				ev.dataTransfer.setData("source", ev.target.parentNode.id);
			}

			function drop(ev) {
				ev.preventDefault();
				let dest;
				if(ev.target.tagName === "IMG"){
					dest = ev.target.parentNode;
				}else{
					dest = ev.target;
				}
				let currentImg = dest.lastElementChild;
				let imgDragged = ev.dataTransfer.getData("img");
				let sourceDiv = ev.dataTransfer.getData("source");
				document.getElementById(sourceDiv).appendChild(currentImg);
				dest.appendChild(document.getElementById(imgDragged));
			}
			
			// --- For mobile --- \\
			var pictureContainer;
			var lastPosition = {x: 0,y: 0};

			function touchend(event) {
				console.log("end");
				imgDragged = event.target;
				imgDragged.remove();
				let dest = document.elementFromPoint(lastPosition.x, lastPosition.y);
				if(dest.tagName === "IMG"){
					dest = dest.parentNode;
				}
				if(dest.getAttribute('ondrop')) {
					let currentImg = dest.lastElementChild;
					if(currentImg)
						pictureContainer.appendChild(currentImg);
					dest.appendChild(imgDragged);
				} else {
					pictureContainer.appendChild(imgDragged);
				}
				imgDragged.style.position = 'initial';
			}

			function touchmove(event) {
				console.log("move");
				event.preventDefault();
				picture = event.target;
				pictureContainer = event.target.parentNode;
				picture.style.position = 'absolute';
				pictureContainer.style.position = 'static';
	
				picture.style.left = (event.touches[0].pageX - (picture.clientWidth/2)) + 'px';
				picture.style.top = (event.touches[0].pageY - (picture.clientHeight/2)) + 'px';
				lastPosition.x = event.touches[0].clientX;
				lastPosition.y = event.touches[0].clientY;
			}
			
			function touchstart(event){
				console.log("start");
				pictureContainer = event.target.parentNode;
			}
			
			// --- Envoi des resultats --- \\
			function sendResults(){
				let divs = document.querySelectorAll('[id^="div-"]');
				let results = {};
				for(let i = 0 ; i < divs.length ; i++){
					let div = divs[i];
					let speaker_id = div.lastElementChild.id;
					results['noteS'+speaker_id] = i+1;
				}
				console.log(results);
				$.ajax({
					data: results,
					url: 'controller/envoyerVotes.php',
					method: 'POST',
					success: function(ret) {
						document.location.href = ret;
					},
					fail: function(xhr, textStatus, errorThrown){
					   console.log('request failed');
					}
				});
			}
		</script>
				<?php
					$speakers = Connection::getInstance()->selectAllSpeakers();
					$count = 1;
					foreach($speakers as $speaker){
						echo '
						<div class="row py-2">
							<div class="col-6 text-right align-self-center">
								<span style="font-size:xx-large;">'.$count.'</span>
							</div>
							<div class="col-6" id="div-'.$count.'" ondrop="drop(event)" ondragover="allowDrop(event)" style="text-align:left;min-height:110px;white-space: nowrap;">
								<span style="display:inline-block;height:100%;vertical-align: middle;"></span>
								<img class="photo_finaliste" id="'.$speaker->getId().'" ontouchstart="touchstart(event)" ontouchmove="touchmove(event)" ontouchend="touchend(event)" src="'.$speaker->getPhoto().'" draggable="true" ondragstart="drag(event)">
							</div>
						</div>
						';
						$count++;
					}
				?>
			<div class="row">
				<div class="col-md-12 text-center">
					<button type="button" class="btn btn-lg red-btn" onClick="sendResults()">Envoyer</button>
				</div>
			</div>

		</section>
		
		<?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

        <script>
            $(document).ready(function(){
            	
            });
        </script>


    </body>

</html>