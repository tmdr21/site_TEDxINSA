<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>
		
       <div class="bandeau title_bandeau team_bandeau">
            <ul>
                <li>
                    <div class="row caption">
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
	                        <div>
	                            <div class="about_number"><?php echo team_bandeau_1_number?></div>
	                            <div class="about_number_object"><?php echo team_bandeau_1_object?></div>
	                        </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12">  
                        	<div>
	                            <div class="about_number"><?php echo team_bandeau_2_number?></div>
	                            <div class="about_number_object"><?php echo team_bandeau_2_object?></div>
	                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12"> 
                        	<button type="button" class="btn red-btn join-btn" data-toggle="modal" data-target="#basicExampleModal"><?php echo team_bandeau_button?></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        
		<section class="container pt-3">
				<?php
					print_r('<div class="years"><b>'.year.' : </b>');
					$years = Connection::getInstance()->selectMemberYears();
					foreach ($years as $index=>$year){
						print_r(($index != 0 ? ' | ' : '').'<a href="team.php?year='.$year[0].'">'.$year[0].'</a>');
					}
					print_r('</div>');
				?>
		</section>

		<section class="team_list">
					<?php
						if(isset($_GET['year'])){
							$year = $_GET['year'];
						}else{
							$year = Connection::getInstance()->selectLastMemberYear()[0];
						}

						print_r('

							<section class="year_section">
								<h1>Année '.$year.'</h1>
								<h2>'.Connection::getInstance()->getThemeByYear($year).'</h2>
							</section>
							
							<div class="container">
								<div class="row">
						');

						$members = Connection::getInstance()->selectMembersByYear($year);
						foreach ($members as $member){
							print_r(
								'<div class="col-lg-3 col-md-6 col-sm-12 text-center pb-3 member-card">
									<div class="member-photo" >
										<img src="'.$member->getPhoto().'" width="100%" height="auto">
									</div>
									<div class="member-name rounded-bottom p-2">
										<p class="name">'
											.utf8_encode($member->getFirstname()).' '.utf8_encode($member->getLastname()).
										'</p>'.
										utf8_encode($member->getTitle()).'
									</div>
								</div>'
							);
						}
					?>
				</div>
			</div>
		</section>
        <?php include('footer.php'); ?>

        <script>
            /* Add class active on navbar link */
            $('.nav-link[href^="team.php"]').parent().addClass('active');
        </script>
		
		<?php 
		$modalTitle = team_modal_title;
		$mailTitle = "[TEAM]";
		$formToShow = "contactModalTeam.php";
		include('contactModal.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

        <script>
        	$(document).ready(function(){
	            /* Add class active on navbar link */
	            $('.nav-link[href^="team.php"]').parent().addClass('active');
	        });
        </script>
		
    </body>

</html>