<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
    <?php include('authenticated.php'); ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include('navbar.php'); ?>

<?php $member = Connection::getInstance()->selectMemberById(intval($_GET["id"]));?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid object-view">
                        <div class="table_icon">
                            <a href="member_edit.php?id=<?php echo $member->getId() ?>">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a id="deleteMember" class="col-4" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $member->getId() ?>" data-name="<?php echo $member->getFirstname() ?>" data-object="member" >
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center mb-4 row object-header">
                            <div class="col-md-2">
                                <div class="div-object-img" style="background-image: url(../<?php echo ($member->getPhoto()!="" ? $member->getPhoto() : 'img/img_default.png'); ?>)">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h1 class="h3 mb-0 text-gray-800"><?php echo utf8_encode($member->getFirstname());?></h1>
                                <h1 class="h3 mb-0 text-gray-800"><?php echo utf8_encode($member->getLastname());?></h1>
                            </div>
                            <div class="col-md-3 row">
                                <div class="form-group col-md-6">
                                    <label>Année</label>
                                    <select class="form-control" disabled>
                                        <?php 
                                            $years = Connection::getInstance()->selectMemberYears();
                                            foreach ($years as $index=>$year){
                                                print_r('
                                                    <option'.($member->getYear() == $year[0] ? ' selected' : '').'>'.$year[0].'</option>
                                                ');
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row object-detail">

                            <div class="col-md-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-danger">
                                            <img class="table_flag_icon" src="../img/fr_flag.svg" />Version Française 
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Titre</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" value="<?php echo utf8_encode($member->getFrenchTitle());?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-danger">
                                            <img class="table_flag_icon" src="../img/en_flag.svg" />English Version
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" value="<?php echo utf8_encode($member->getEnglishTitle());?>" disabled>
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


        <?php include('modal/delete_modal.php'); ?>

        <?php include('footer.php'); ?>


        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

    </body>

</html>
