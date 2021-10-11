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
                                              <th>Nom</th>
                                              <th>Prenom</th>
                                              <th>Année</th>
                                              <th>Rôle</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                              <th>Image</th>
                                              <th>Nom</th>
                                              <th>Prenom</th>
                                              <th>Année</th>
                                              <th>Rôle</th>
                                              <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                <?php 
                                    $members = Connection::getInstance()->selectAllMembers();
                                    foreach ($members as $member){
                                        print_r('
                                            <tr>
                                                <td>
                                                    <div class="col-lg-4 div-talk-img" style="background-image: linear-gradient(black, black), url(../'.$member->getPhoto().')">
                                                        <div class="talk-img-shadow"></div>
                                                    </div>
                                                </td>
                                                <td>'.utf8_encode($member->getLastname()).'</td>
                                                <td>'.utf8_encode($member->getFirstname()).'</td>
                                                <td style="text-align: center;">'.$member->getYear().'</td>
                                                <td>'.utf8_encode($member->getTitle()).'</td>
                                        ');

                                        print_r('
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="row table_icon" style="text-align: center;">
                                                        <a class="col-4" target="" href="member_edit.php?id='.$member->getId().'">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <a class="col-4" target="" href="member_view.php?id='.$member->getId().'">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="col-4" target="" data-toggle="modal" data-target="#deleteModal" data-object="member" data-id="'.$member->getId().'" data-name="'.utf8_encode($member->getFirstname().' '.$member->getLastname()).'">
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
