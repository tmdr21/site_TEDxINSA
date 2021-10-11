        <!--Navbar-->

        <!-- <div class='preloader'><div class='loaded'>&nbsp;</div></div> -->
<?php
    session_start();

    // Set Language variable
    if(isset($_POST['lang']) && !empty($_POST['lang'])){
        $_SESSION['lang'] = $_POST['lang'];

        if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_POST['lang'])
            echo "<script type='text/javascript'> location.reload(); </script>";
     
    }
	
    if(isset($_SESSION['lang']))
        include "datas/lang/".$_SESSION['lang'].".php";
    else{
		$_SESSION['lang'] = "fr";
		include "datas/lang/fr.php";
	}
        
    
    function getWantedLangage(){
        if(isset($_SESSION['lang']) && $_SESSION['lang'] == "fr")
            return "en";
        else
            return "fr";
    }
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow ">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo_tedxinsa_black.png" alt="" />
            </a>
            <button id="navbar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav navbar-nav pull-right hidden-md-down text-uppercase" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><?php echo navbar_homepage ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="talks.php?year=<?php print_r(Connection::getInstance()->selectLastTalkYear()[0]);?>"><?php echo navbar_talks ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php?year=<?php print_r(Connection::getInstance()->selectLastMemberYear()[0]);?>"><?php echo navbar_team ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sponsors.php?year=<?php print_r(Connection::getInstance()->selectLastSponsorYear()[0]);?>"><?php echo navbar_sponsors ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="votes.php"><?php echo navbar_concours ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><?php echo navbar_about ?></a>
                    </li>
                </ul>
            </div>
            <div id="nav-language">
                <form method='post' action='' id='form_lang' hidden >
                    <input type="text" name="lang" value="<?php echo getWantedLangage(); ?>">
                </form>
                <img id="language_flag" src="img/<?php echo getWantedLangage(); ?>_flag.svg" data-lang="<?php echo getWantedLangage(); ?>" onclick="document.getElementById('form_lang').submit()"/>
            </div>
        </div>
    </nav>