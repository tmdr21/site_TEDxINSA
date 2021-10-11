<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>
		
		<div class="text-center py-5 my-5">
			<img src="img/404.svg" style="width:40%">
		</div>
		<div class="text-center py-5  my-5">
			<a href="index.php"><button type="button" class="btn red-btn"><?php echo retour_accueil?></button></a>
		</div>	
		<?php include('footer.php'); ?>

		<!-- SCRIPTS -->
		<?php include('scripts.php'); ?>
	</body>
</html>