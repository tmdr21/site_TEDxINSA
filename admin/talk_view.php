<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>
    <?php include('authenticated.php'); ?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include('navbar.php'); ?>

<?php $talk = Connection::getInstance()->selectTalkById(intval($_GET["id"]));?>
                    <!-- Begin Page Content -->
                    <div class="container-fluid object-view">
                        <div class="table_icon">
                            <a href="talk_edit.php?id=<?php echo $talk->getId() ?>">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a id="deleteTalk" class="col-4" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $talk->getId() ?>" data-name="<?php echo $talk->getName() ?>" data-object="talk" >
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center mb-4 row object-header">
                            <div class="col-md-2">
                                <div class="div-object-img" style="background-image: url(../<?php echo ($talk->getPhoto()!="" ? $talk->getPhoto() : "img/img_default.png"); ?>)">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h1 class="h3 mb-0 text-gray-800"><?php echo utf8_encode($talk->getName());?></h1>
                                <a href="<?php echo $talk->getVideo();?>" target="_blank"><?php echo $talk->getVideo();?></a>
                            </div>
                            <div class="col-md-3 row">
                                <div class="form-group col-md-6">
                                    <label>Année</label>
                                    <select class="form-control" disabled>
                                        <?php 
                                            $years = Connection::getInstance()->selectTalkYears();
                                            foreach ($years as $index=>$year){
                                                print_r('
                                                    <option'.($talk->getYear() == $year[0] ? ' selected' : '').'>'.$year[0].'</option>
                                                ');
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Langue</label>
                                    <div id="custom-select_talk" class="custom-select disabled" >
                                        <img class="table_flag_icon" src=<?php echo "../img/".$talk->getLanguage()."_flag.svg" ?>>
                                    </div>
                                    <div id="custom-options_talk" class="custom-options" style="display: none; position: absolute;">
                                        <?php 
                                            $langs = Connection::getInstance()->selectTalkLanguages();
                                            foreach ($langs as $index=>$lang){
                                                print_r('
                                                    <div id="'.$index.'" class="custom-option-menu custom-option-menu_talk">
                                                        <img class="table_flag_icon" src="../img/'.$lang[0].'_flag.svg" />
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
                                                <input class="form-control" value="<?php echo utf8_encode($talk->getFrenchTitle());?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                    <textarea class="form-control" disabled><?php echo utf8_encode($talk->getFrenchDescription());?></textarea>
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
                                                <input class="form-control" value="<?php echo utf8_encode($talk->getEnglishTitle());?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                    <textarea class="form-control" disabled><?php echo utf8_encode($talk->getEnglishDescription());?></textarea>
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
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getFacebook());?>" disabled>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-instagram"></i>Instagram</label>
                                                        <div class="col-sm-9">
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getInstagram());?>" disabled>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-youtube-play"></i>Youtube</label>
                                                        <div class="col-sm-9">
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getYoutube());?>" disabled>
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
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getLinkedin());?>" disabled>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-twitter"></i>Twitter</label>
                                                        <div class="col-sm-9">
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getTwitter());?>" disabled>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label"><i class="fa fa-globe"></i>Site Internet</label>
                                                        <div class="col-sm-9">
                                                                <input class="form-control" value="<?php echo utf8_encode($talk->getWebsite());?>" disabled>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
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
