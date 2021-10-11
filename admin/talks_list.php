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
                        <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                              <th>Image</th>
                                              <th>Prenom Nom</th>
                                              <th>Année</th>
                                              <th>Titre</th>
                                              <th>Langue</th>
                                              <th>Réseaux</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Image</th>
                                              <th>Prenom Nom</th>
                                              <th>Année</th>
                                              <th>Titre</th>
                                              <th>Langue</th>
                                              <th>Réseaux</th>
                                              <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                <?php 
                                    $talks = Connection::getInstance()->selectAllTalks();
                                    foreach ($talks as $talk){
                                        print_r('
                                            <tr>
                                                <td>
                                                    <div class="div-talk-img" style="background-image: linear-gradient(black, black), url(../'.($talk->getPhoto()!="" ? $talk->getPhoto() : "img/img_default.png").')">
                                                        <div class="talk-img-shadow"></div>
                                                    </div>
                                                </td>
                                                <td>'.utf8_encode($talk->getName()).'</td>
                                                <td style="text-align: center;">'.$talk->getYear().'</td>
                                                <td>'.utf8_encode($talk->getTitle()).'</td>
                                                <td style="text-align: center;">
                                                    <img class="table_flag_icon" src="../img/'.$talk->getLanguage().'_flag.svg"> 
                                                </td>
                                                <td>
                                                    <div class="speaker-socials">
                                                        <ul>
                                        ');
                                        if($talk->getFacebook() != '')
                                            print_r(
                                                '
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getFacebook().'">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        if($talk->getInstagram() != '')
                                            print_r('
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getInstagram().'">
                                                                    <i class="fa fa-instagram"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        if($talk->getYoutube() != '')
                                            print_r('   
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getYoutube().'">
                                                                    <i class="fa fa-youtube-play"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        if($talk->getLinkedin() != '')
                                            print_r('   
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getLinkedin().'">
                                                                    <i class="fa fa-linkedin"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        if($talk->getTwitter() != '')
                                            print_r('   
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getTwitter().'">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        if($talk->getWebsite() != '')
                                            print_r('   
                                                            <li>
                                                                <a target="_blank" href="'.$talk->getWebsite().'">
                                                                    <i class="fa fa-globe"></i>
                                                                </a>
                                                            </li>
                                            ');

                                        print_r('
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="row table_icon" style="text-align: center;">
                                                        <a class="col-4" target="" href="talk_edit.php?id='.$talk->getId().'">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a class="col-4" target="" href="talk_view.php?id='.$talk->getId().'">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="col-4" target="" data-toggle="modal" data-target="#deleteModal" data-object="talk" data-id="'.$talk->getId().'" data-name="'.$talk->getName().'">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                   </div>
                                                </td>
                                            </tr>
                                        ');
                                    }
                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

        <?php include('modal/delete_modal.php'); ?>

        <?php include('footer.php'); ?>


        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>
