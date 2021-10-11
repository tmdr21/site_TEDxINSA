<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		// Delete referenced photo
		$sponsor = Connection::getInstance()->selectSponsorById($id);
		if(file_exists("../../".$sponsor->getPhoto())){
			unlink("../../".$sponsor->getPhoto());
		}
		$sponsor = Connection::getInstance()->deleteSponsor($id);
		echo $sponsor;
	}
?>