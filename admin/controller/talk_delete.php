<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		// Delete referenced photo
		$talk = Connection::getInstance()->selectTalkById($id);
		if(file_exists("../../".$talk->getPhoto())){
			unlink("../../".$talk->getPhoto());
		}
		$talk = Connection::getInstance()->deleteTalk($id);
		echo $talk;
	}
?>