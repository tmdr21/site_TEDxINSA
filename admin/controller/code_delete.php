<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$voteKey = Connection::getInstance()->deleteCode($id);
		echo $voteKey;
	}
	
?>