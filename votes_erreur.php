<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>
        
        <div class="bandeau title_bandeau votes_bandeau">
            <ul>
                <li>
                    <div class="caption">
                        <h1>Concours Speaker</h1>
                    </div>
                </li>
            </ul>
        </div>
        
        <section class="container">

    		<div class="container">
    			<div class="text-center mb-4">
    					<h1 class="h1 mb-3 font-weight-normal">Une erreur est survenue.</h1>
    					<p>Merci de reprendre au début.</p>
    					<a href="votes.php"><button class="btn btn-lg red-btn" >Retour</button></a>
    				</div>
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