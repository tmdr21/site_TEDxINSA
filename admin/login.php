<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
	
	<?php
		if(isset($_POST['email']) && isset($_POST['password'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user = Connection::getInstance()->selectUser($_POST['email']);
			if($user != null && password_verify($password, $user->getPassword())){
				session_start();                  
				// Store data in session variables
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["username"] = $username;                            
				
				// Redirect user to welcome page
				header("location: index.php");
			}else{
				$error = "Identifiants invalides";
			}
		}
	?>

    <body class="bg-gradient-danger">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(../img/logo_tedxinsa_vertical.png); background-size: contain; background-repeat: no-repeat;"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Bienvenue</h1>
                                        </div>
                                        <form class="user" action="" method="post">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control form-control-user" placeholder="Email administrateur" required>
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control form-control-user" placeholder="Mot de passe" required>
                                            </div>
                                            <input type="submit" class="btn btn-danger btn-user btn-block" value="Connexion"/>
											<?php
											if(isset($error)){
												echo '
													<br>
													<div class="alert alert-danger" role="alert">'.$error.'</div>
													';
											}
											?>
                                            <hr>
                                            <div class="text-center">
                                              <a class="small" href="#">Mot de passe oublié ?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>
