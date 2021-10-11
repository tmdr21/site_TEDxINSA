<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">

        <?php include('navbar.php'); ?>
		
       <div class="bandeau title_bandeau sponsors_bandeau">
            <ul>
                <li>
                    <div class="row caption">
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
                        	<div>
	                            <div class="about_number"><?php echo sponsors_bandeau_1_number?></div>
	                            <div class="about_number_object"  data-toggle="popover" title="<?php echo sponsors_bandeau_1_popover?>"><?php echo sponsors_bandeau_1_object?></div>
	                        </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
                        	<div>
	                            <div class="about_number"><?php echo sponsors_bandeau_2_number?></div>
	                            <div class="about_number_object"><?php echo sponsors_bandeau_2_object?></div>
	                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"> 
                        	<button type="button" class="btn red-btn join-btn" data-toggle="modal" data-target="#basicExampleModal"><?php echo sponsors_bandeau_button?></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
		<section class="container pt-3">
			<?php
				print_r('<div class="years"><b>'.year.' : </b>');
				$years = Connection::getInstance()->selectSponsorYears();
				foreach ($years as $index=>$year){
					print_r(($index != 0 ? ' | ' : '').'<a href="sponsors.php?year='.$year[0].'">'.$year[0].'</a>');
				}
				print_r('</div>');
			?>
		</section>

		<section class="sponsors_list">
			<div class="container">
				<?php
					if(isset($_GET['year'])){
						$year = $_GET['year'];
					}else{
						$year = Connection::getInstance()->selectLastSponsorYear()[0];
					}

					print_r('

						<section class="year_section">
							<h1>Année '.$year.'</h1>
							<h2>'.Connection::getInstance()->getThemeByYear($year).'</h2>
						</section>
						<div class="container">
					');

					$sponsors = Connection::getInstance()->selectSponsorsByYear($year);
					foreach ($sponsors as $sponsor){
						print_r(
						'<div class="row sponsors_row">
							<div class="col-lg-4 col-sm-12 text-center pb-3 align-self-center">
								<a href="'.$sponsor->getLink().'" target="_blank">
									<img src="'.$sponsor->getPhoto().'" class="sponsor-img">
								</a>
							</div>
							<div class="col-lg-8 col-sm-12 text-justify pb-3 align-self-center">
								'.utf8_encode($sponsor->getDescription()).'
							</div>
						</div>'
						);
					}
				?>
			</div>
		</section>

        <?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>
        <script>       
        	$(document).ready(function(){     
	            /* Add class active on navbar link */
	            $('.nav-link[href^="sponsors.php"]').parent().addClass('active');
	        });
        </script>
		
		<?php 
		$modalTitle = sponsors_modal_title;
		$mailTitle = "[SPONSOR]";
		$formToShow = "contactModalSponsors.php";
		include('contactModal.php'); ?>

    </body>

</html>