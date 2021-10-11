<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		// Delete referenced photo
		$member = Connection::getInstance()->selectMemberById($id);
		if(file_exists("../../".$member->getPhoto())){
			unlink("../../".$member->getPhoto());
		}
		$member = Connection::getInstance()->deleteMember($id);
		echo $member;
	}
?>