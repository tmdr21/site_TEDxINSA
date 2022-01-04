<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['title_fr']) 
      && isset($_POST['title_en']) && isset($_POST['year']) && isset($_POST['id'])){
	
		$firstname = utf8_decode($_POST['firstname']);
		$lastname = utf8_decode($_POST['lastname']);
		$title_fr = utf8_decode($_POST['title_fr']);
		$title_en = utf8_decode($_POST['title_en']);
		$year = $_POST['year'];
		$photo = str_replace(" ", "_","datas/team/".$year."/".$firstname."_".$lastname.".jpg");
		$id = $_POST['id'];

		// If path doesn't exists, create it
		if(!is_dir("../../datas/team/".$year)){
			mkdir("../../datas/team/".$year, 0755, true);
		}
		if(isset($_FILES['photo_file'])){
			// Delete old photo if exists
			$member = Connection::getInstance()->selectMemberById($id);
			if($member->getPhoto() !== "" && $member->getPhoto() !== null && file_exists("../../".$member->getPhoto())){
				unlink("../../".$member->getPhoto());
			}
			// Register new photo in file path
			move_uploaded_file($_FILES['photo_file']['tmp_name'], "../../".$photo); 
		}

		$member = Connection::getInstance()->updateMemberById($id, $firstname, $lastname, $title_fr, $title_en, $year, $photo);
		echo $member;
    }
?>