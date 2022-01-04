<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['name']) && isset($_POST['link']) && isset($_POST['description_fr']) 
		&& isset($_POST['description_en'])&& isset($_POST['year'])){
	
      	$name = utf8_decode($_POST['name']);
      	$link = $_POST['link'];
      	$description_fr = utf8_decode($_POST['description_fr']);
      	$description_en = utf8_decode($_POST['description_en']);
      	$year = $_POST['year'];
      	$photo = str_replace(" ", "_","datas/sponsor/".$year."/".$name.".jpg");
	  
		// If path doesn't exists, create it
		if(!is_dir("../../datas/sponsor/".$year)){
			mkdir("../../datas/sponsor/".$year, 0755, true);
		}
		if(isset($_FILES['photo_file'])){
			// Register photo in file path
			move_uploaded_file($_FILES['photo_file']['tmp_name'], "../../".$photo); 
		}else{
			// If no photo choosen, put default
			copy("../../img/img_default.jpg", "../../".$photo);
		}

		$sponsor = Connection::getInstance()->createSponsor($name, $link, $description_fr, $description_en, $year, $photo);
		echo $sponsor;
    }
?>