<!DOCTYPE html>
<html lang="en">

    <?php include('header.php'); ?>

    <body data-spy="scroll" data-target=".navbar-desktop">
        
       <?php include('navbar.php'); ?>

       <div class="bandeau home_bandeau">
            <ul>
                <li>
                    <div class="caption">
                        <div>
                            <h1>TEDxINSA</h1>
                            <a href="https://docs.google.com/forms/d/16S58S09XHAe3syzY54lCcYy3X1J-0P3yM-GLdWV-xcE/edit" style="padding: 15px 36px; display: inline-block; font-family: 'Open Sans', 'HelveticaNeue-Light', 'Helvetica Neue Light', 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif; font-size: 20px; font-weight: 600; text-align: center; color: #e62b1e; text-decoration: none; background-color: #fff; border: none; -webkit-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3); box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);" id="widgetButton_event" target="_blank"><?php echo ticket?></a>
							<!--button type="button" class="btn btn-danger m-t-3 waves-effect waves-red">See More</button-->
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <section class="home_information">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main_about_area">

                            <div class="main_about_content">
                                <div class="row">
                                    <div class="col-md-4 home_calendar">
                                        <h2><?php echo agenda ?></h2>

                                        <?php
                                            $agenda_events = Connection::getInstance()->selectAgenda();
                                            foreach ($agenda_events as $agenda_event){
                                                print_r(
                                                    '<div class="cal_event">
                                                        <div class="cal_date_border">
                                                            <div class="cal_date">
                                                                <div class="jour">'.$agenda_event->getDay().'</div>
                                                                <div class="mois">'.$agenda_event->getMonth().'</div>
                                                            </div>
                                                        </div>
                                                        <div class="cal_details">
                                                            <span class="cal_description">'.utf8_encode($agenda_event->getTitle()).'</span>
                                                ');

                                                if($agenda_event->getInfo())
                                                    print_r(
                                                        '<span class="cal_date-custom">'.utf8_encode($agenda_event->getInfo()).'</span>.'
                                                    );

                                                print_r(
                                                        '</div>
                                                    </div>');
                                            }
                                        ?>
                                    </div>

                                    <div class="col-md-1" style="height: 3rem;">
                                    </div>

                                    <div class="col-md-7 home_description">
                                        <div class="tedx_description">
                                            <h2><?php echo homepage_tedx_description_title?></h2>
                                            <p><?php echo homepage_tedx_description_content?></p>
                                        </div>
                                        <div class="description">
                                            <h2><?php echo homepage_section_title?></h2>
                                            <p><?php echo homepage_section_content?></p>
                                        </div>
                                        <div class="theme_description">
                                            <h2><?php echo homepage_event_description_title?></h2>
                                            <p><?php echo homepage_event_description_content?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End of About Section-->        

        <section class="footer_map">
            <div class="map_information_container">
                <div class="map_information">
                    <h4><?php echo theEvent?></h4>
                    <ul>
                        <li class="address_line"><i class="fa fa-map-marker"></i><span><?php echo event_location ?></span></li>
                        <li><i class="fa fa-calendar"></i><span><?php echo event_date ?></span></li>
                        <li><i class="fa fa-clock-o"></i><span><?php echo event_time ?></span></li>
                    </ul>
                </div>
            </div>
        </section><!-- End of About Section-->


        <?php include('footer.php'); ?>

        <!-- SCRIPTS -->
        <?php include('scripts.php'); ?>

        <script>
            $(document).ready(function(){
                /* Add class active on navbar link */
                $('.nav-link[href="index.php"]').parent().addClass('active');

                if(window.screen.width <= 768){
                    var footerMapResponsive = document.createElement("section");
                    footerMapResponsive.classList.add("footer_map","footer_map_responsive");
                    $('.footer_map').after(footerMapResponsive);
                }
            });
        </script>


    </body>

</html>