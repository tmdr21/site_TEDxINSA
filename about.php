<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
        <?php include('navbar.php'); ?>

       <div class="bandeau title_bandeau about_bandeau">
            <ul>
                <li>
                    <div class="row caption">
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
                            <div>
                                <div class="about_number"><?php echo about_bandeau_1_number?></div>
                                <div class="about_number_object"><?php echo about_bandeau_1_object?><!--Organisateurs Elèves-Ingénieurs--></div>
                            </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
                            <div>
                                <div class="about_number"><?php echo about_bandeau_2_number?></div>
                                <div class="about_number_object"><?php echo about_bandeau_2_object?></div>
                            </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12"> 
                            <div>
                                <div class="about_number"><?php echo about_bandeau_3_number?></div>
                                <div class="about_number_object"><?php echo about_bandeau_3_object?></div>
                            </div>
                        </div>
                        <div class="caption_elem col-lg-3 col-md-6 col-sm-12">
                            <div> 
                                <div class="about_number"><?php echo about_bandeau_4_number?></div>
                                <div class="about_number_object"><?php echo about_bandeau_4_object?></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <section class="about_ted">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-12 ted_information">
                        <img src="datas/about/ted.png" />
                        <?php echo ted_description?>
                    </div>
                    <div class="col-lg-4 col-sm-12 tedx_information">
                        <img src="datas/about/tedx.png" />
                        <?php echo tedx_description?>
                    </div>
                    <div class="col-lg-4 col-sm-12 tedxinsa_information">
                        <img src="datas/about/tedxinsa.png" />
                        <?php echo tedxinsa_description?>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">
            <div class="contact_div">
                <div class="container">
                    <h1><?php echo contact_us?></h1>
                    <div class="row">
                        <div class="email_contact col-sm-8 col-xs-12">
                            <h2 class="text_center"><?php echo email?></h2>
                            <p class="text_center"><?php echo email_contact?></p>
                            <form action="controller/sendMail.php" method="post">
                                <div class="row">
                                    <div class="form-group col">
                                    <p class="form-label"><?php echo email_address?><?php echo required_field?></p>
                                    <input name="email" type="email" class="form-control" placeholder="<?php echo your_email?>" required>
                                    <small class="form-text text-muted"><?php echo never_share_information?></small>
                                </div>
                                <div class="form-group col">
                                    <p class="form-label"><?php echo subject?><?php echo required_field?></p>
                                    <input name="subject" type="text" class="form-control" placeholder="<?php echo message_subject?>" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <p class="form-label"><?php echo subject?><?php echo required_field?></p>
                                    <textarea name="message" class="form-control" rows="3" placeholder="<?php echo message_content?>" required></textarea>
                                </div>
								<input name="location" type="hidden" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <div class="form-group text_center">
                                    <button type="submit" class="btn red-btn"><?php echo send?></button>
                                    <!-- TODO : afficher popup bien envoyé  -->
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text_center"><?php echo postal?></h2>
                            <p class="text_center"><?php echo postal_contact?></p>
                            <div class="contact_address text_center">
                                <?php echo postal_address?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

        <script>        
            $(document).ready(function(){    
                /* Add class active on navbar link */
                $('.nav-link[href="about.php"]').parent().addClass('active');
            });
        </script>

    </body>

</html>