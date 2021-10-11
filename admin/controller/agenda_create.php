<?php
  include('../authenticated.php');
  include('../../model/Connection.php');
	
    if(isset($_POST['day']) && isset($_POST['month_fr']) && isset($_POST['month_en']) 
      && isset($_POST['title_fr']) && isset($_POST['title_en']) 
      && isset($_POST['info_fr']) && isset($_POST['info_en']))  {
	
        $day = utf8_decode($_POST['day']);
        $month_fr = utf8_decode($_POST['month_fr']);
        $month_en = utf8_decode($_POST['month_en']);
      	$title_fr = utf8_decode($_POST['title_fr']);
      	$title_en = utf8_decode($_POST['title_en']);
      	$info_fr = utf8_decode($_POST['info_fr']);
      	$info_en = $_POST['info_en'];

	  /*fwrite($photo_image, $_POST['photo_file']);
	  echo fclose($photo_image);*/
      $agenda = Connection::getInstance()->createAgenda($day, $month_fr, $month_en, $title_fr, $title_en, $info_fr, $info_en);
		echo $agenda;
    }
?>