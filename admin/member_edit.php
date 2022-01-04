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
                    <div class="container-fluid object-view object-view-edit">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center mb-4 row object-header">
                            <div class="col-md-2">
                                <input id="photo_file" type='file' style="display: none;" />
                                <div id="photo" class="div-object-img" style="background-image: url(../<?php echo ($member->getPhoto()!="" ? $member->getPhoto() : "img/img_default.png") ?>)">
                                    <div class="div-object-img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input id="firstname" class="form-control h1" value="<?php echo utf8_encode($member->getFirstname());?>">
                                <input id="lastname" class="form-control h1" value="<?php echo utf8_encode($member->getLastname());?>">
                            </div>
                            <div class="col-md-3 row">
                                <div class="form-group col-md-6">
                                    <label>Année</label>
                                    <select id="year" class="form-control">
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
                                                <input id="title_fr" class="form-control" value="<?php echo utf8_encode($member->getFrenchTitle());?>">
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
                                                <input id="title_en" class="form-control" value="<?php echo utf8_encode($member->getEnglishTitle());?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="object-edit-buttons">
                            <button type="button" class="btn btn-secondary" onclick="window.location = 'member_view.php?id='+<?php echo $member->getId(); ?>">Annuler</button>
                            <button type="button" class="btn btn-danger" onclick="updateMember(<?php echo $_GET['id'] ?>);">Valider</button>
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
