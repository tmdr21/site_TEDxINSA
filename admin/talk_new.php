<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
    <?php include('authenticated.php'); ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include('navbar.php'); ?>

                    <!-- Begin Page Content -->
                    <div class="container-fluid object-view object-view-edit">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center mb-4 row object-header">
                            <div class="col-md-2">
                                <input id="photo_file" type='file' style="display: none;"/>
                                <div id="photo" class="div-object-img" style="background-image: url(../img/img_default.png)">
                                    <div class="div-object-img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <input id="name" class="form-control h1" placeholder="Prenom Nom">
                                <input id="video" class="form-control" placeholder="Url vidéo">
                            </div>
                            <div class="col-md-3 row">
                                <div class="form-group col-md-6">
                                    <label>Année</label>
                                    <select id="year" class="form-control">
                                        <?php 
                                            $years = Connection::getInstance()->getThemesYears();
                                            foreach ($years as $index=>$year){
                                                print_r('
                                                    <option'.(date("Y") == $year[0] ? ' selected' : '').'>'.$year[0].'</option>
                                                ');
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Langue</label>
                                    <div id="custom-select_talk" class="custom-select" >
                                        <img id="lang" class="table_flag_icon" data-lang="fr" src="../img/fr_flag.svg">
                                    </div>
                                    <div id="custom-options_talk" class="custom-options" style="display: none; position: absolute;">
                                        <?php 
                                            $langs = Connection::getInstance()->selectTalkLanguages();
                                            foreach ($langs as $index=>$lang){
                                                print_r('
                                                    <div id="'.$index.'" class="custom-option-menu custom-option-menu_talk">
                                                        <img class="table_flag_icon" data-lang="'.$lang[0].'" src="../img/'.$lang[0].'_flag.svg" />
                                                    </div>
                                                ');
                                            } 
                                        ?>
                                    </div>
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
                                                <input id="title_fr" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="description_fr" class="form-control"></textarea>
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
                                                <input id="title_en" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="description_en" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-danger">
                                            Réseaux Sociaux
                                        </h6>
                                    </div>
                                    <div class="card-body row speaker-socials-div">
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-facebook"></i>Facebook</label>
                                                        <div class="col-sm-9">
                                                            <input id="facebook" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-instagram"></i>Instagram</label>
                                                        <div class="col-sm-9">
                                                            <input id="instagram" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-youtube-play"></i>Youtube</label>
                                                        <div class="col-sm-9">
                                                            <input id="youtube" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-linkedin"></i>LinkedIn</label>
                                                        <div class="col-sm-9">
                                                            <input id="linkedin" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-twitter"></i>Twitter</label>
                                                        <div class="col-sm-9">
                                                            <input id="twitter" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-globe"></i>Site Internet</label>
                                                        <div class="col-sm-9">
                                                            <input id="website" class="form-control">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="object-edit-buttons">
                            <button type="button" class="btn btn-secondary" onclick="window.location = 'talk_list.php'">Annuler</button>
                            <button type="button" class="btn btn-danger" onclick="createTalk();">Valider</button>
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
