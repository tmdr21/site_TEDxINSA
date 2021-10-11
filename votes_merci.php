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
    					<h1 class="h1 mb-3 font-weight-normal">Merci pour votre vote !</h1>
    					<a href="https://tedxinsa.com/"><button class="btn btn-lg red-btn" >Retourner sur le site</button></a>
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