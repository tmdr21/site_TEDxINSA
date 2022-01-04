<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
	<?php include('authenticated.php'); ?>

    <body id="page-top">
        
      <!-- Page Wrapper -->
      <div id="wrapper">
       
        <?php include('navbar.php'); ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">
                                Année <?php echo date("Y")?> - <?php echo  
                                            count(Connection::getInstance()->getThemes());?> <sup>ème</sup> Edition - <?php echo Connection::getInstance()->getThemeByYear(date("Y"));?>
                            </h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">

                            <!-- Speakers -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de speakers</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count(Connection::getInstance()->selectTalksByYear(date("Y")));?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-microphone fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sponsors -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre de sponsors</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count(Connection::getInstance()->selectSponsorsByYear(date("Y")));?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-euro-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Membres -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombre de membres</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count(Connection::getInstance()->selectMembersByYear(date("Y")));?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Agenda -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nombre d'événements</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php echo count(Connection::getInstance()->selectAgenda());?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

        <?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>