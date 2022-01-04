<?php
	error_reporting(E_ERROR);
	include('../authenticated.php');
	include('../../model/Connection.php');
	
    if(isset($_POST['name']) && isset($_POST['link']) && isset($_POST['description_fr']) && isset($_POST['description_en'])
      && isset($_POST['year']) && isset($_POST['id'])){
	
		$name = utf8_decode($_POST['name']);
		$link = utf8_decode($_POST['link']);
		$description_fr = utf8_decode($_POST['description_fr']);
		$description_en = utf8_decode($_POST['description_en']);
		$year = $_POST['year'];
		$photo = str_replace(" ", "_","datas/sponsor/".$year."/".$name.".jpg");
		$id = $_POST['id'];
		
		// If path doesn't exists, create it
		if(!is_dir("../../datas/sponsor/".$year)){
			mkdir("../../datas/sponsor/".$year, 0755, true);
		}
		if(isset($_FILES['photo_file'])){
			// Delete old photo if exists
			$sponsor = Connection::getInstance()->selectSponsorById($id);
			if($sponsor->getPhoto() !== "" && $sponsor->getPhoto() !== null && file_exists("../../".$sponsor->getPhoto())){
				unlink("../../".$sponsor->getPhoto());
			}
			// Register new photo in file path
			move_uploaded_file($_FILES['photo_file']['tmp_name'], "../../".$photo); 
		}
		  
		$result = Connection::getInstance()->updateSponsorById($id, $name, $link, $description_fr, $description_en, $year, $photo);
		echo $result;
    }
?>