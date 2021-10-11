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

			<h1><?php echo votes_title_contest?></h1>
			<p><?php echo votes_description_contest?></p>
			<p><?php echo votes_contact_contest?></p>

			<div class="text-center"> 
            	<a href="<?php echo votes_url_contest?>"><button type="button" class="btn red-btn btn-lg"><?php echo votes_btn_contest?></button></a>
            </div>

		</section>

		<section class="container">

			<form class="container" autocomplete="off" action="controller/validerCode.php" method="post" style="max-width: 600px; margin: 6% auto;">
				<div class="text-center mb-4">
					<h1 class="h1 mb-3 font-weight-normal"><?php echo votes_title_code?></h1>
					<p><?php echo votes_description_code?></p>
				</div>

				<div class="form-group">
					<input id="inputCode" name="inputCode" class="form-control text-center" placeholder="Code" required>
				</div>
				<div class="text-center">
					<button class="btn btn-lg red-btn" type="submit"><?php echo validate?></button>
				</div>
			</form>

		</section>
		
		<?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

        <script>
            $(document).ready(function(){
            	/* Add class active on navbar link */
	            $('.nav-link[href^="votes.php"]').parent().addClass('active');
            });
        </script>


    </body>

</html>