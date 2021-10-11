<!DOCTYPE html>
<html lang="en">


    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>
		
       <div class="bandeau title_bandeau talks_bandeau">
            <ul>
                <li>
                    <div class="row caption">
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12">  
                        	<div>
	                            <div class="about_number"><?php echo talks_bandeau_1_number?></div>
	                            <div class="about_number_object"><?php echo talks_bandeau_1_object?></div>
	                        </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12">  
                        	<div>
	                            <div class="about_number"><?php echo talks_bandeau_2_number?></div>
	                            <div class="about_number_object"><?php echo talks_bandeau_2_object?></div>
	                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"> 
                        	<button type="button" class="btn red-btn join-btn" data-toggle="modal" data-target="#basicExampleModal"><?php echo talks_bandeau_button?></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

		<section class="container pt-3">
				<?php
					print_r('<div class="years"><b>'.year.' : </b>');
					$years = Connection::getInstance()->selectTalkYears();
					foreach ($years as $index=>$year){
						print_r(($index != 0 ? ' | ' : '').'<a href="talks.php?year='.$year[0].'">'.$year[0].'</a>');
					}
					print_r('</div>');
				?>
		</section>

		<section class="talks_list">

				<?php
					if(isset($_GET['year'])){
						$year = $_GET['year'];
					}else{
						$year = Connection::getInstance()->selectLastTalkYear()[0];
					}

					print_r('

						<section class="year_section">
							<h1>Année '.$year.'</h1>
							<h2>'.Connection::getInstance()->getThemeByYear($year).'</h2>
						</section>
						<div class="container">
					');

					$talks = Connection::getInstance()->selectTalksByYear($year);
					foreach ($talks as $talk){
						print_r(
						'
						<div class="row talks_row" >
							<div class="col-lg-8 col-sm-12 text-center align-self-center mb-3">
								<div class="row">
									<div class="col-lg-4 div-talk-img" style="background-image: linear-gradient(black, black), url('.$talk->getPhoto().')">
										<div class="talk-img-shadow"></div>
										<div class="talk-img-information talk-img-information-language">
											<img src="img/'.$talk->getLanguage().'_flag.svg">				
											<span>');
						if($talk->getLanguage() == "en")
							print_r(talk_language_en);
						else
							print_r(talk_language_fr);

						print_r('
											</span>
										</div>
										<div class="talk-img-information">
											<span class="talk-img-name"> '.utf8_encode($talk->getName()).' </span>
											<ul class="speaker-socials">');
						if($talk->getFacebook() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getFacebook().'">
															<i class="fa fa-facebook"></i>
														</a>
													</li>');

						if($talk->getInstagram() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getInstagram().'">
															<i class="fa fa-instagram"></i>
														</a>
													</li>');

						if($talk->getYoutube() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getYoutube().'">
															<i class="fa fa-youtube-play"></i>
														</a>
													</li>');

						if($talk->getLinkedin() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getLinkedin().'">
															<i class="fa fa-linkedin"></i>
														</a>
													</li>');

						if($talk->getTwitter() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getTwitter().'">
															<i class="fa fa-twitter"></i>
														</a>
													</li>');

						if($talk->getWebsite() != '')
							print_r('				<li>
														<a target="_blank" href="'.$talk->getWebsite().'">
															<i class="fa fa-globe"></i>
														</a>
													</li>');
						print_r('
											</ul>
										</div>
									</div>
									<div class="col-lg-8 div-talk-video">
										<iframe frameborder="0" src="'.$talk->getVideo().'" class="talk-video d-block mx-auto">
										</iframe> 
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-sm-12 align-self-center mb-3 div-talk-description">
								<p>'.utf8_encode($talk->getDescription()).'<p>
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
	            $('.nav-link[href^="talks.php"]').parent().addClass('active');
	        });
        </script>
		
		<?php 
		$modalTitle = speaker_modal_title;
		$mailTitle = "[SPEAKER]";
		$formToShow = "contactModalSpeaker.php";
		include('contactModal.php'); ?>

    </body>

</html>