<?php
	include('../model/Connection.php');
	session_start();
	
	$code = $_POST["inputCode"];

	if(Connection::getInstance()->checkCode($code)){
		$_SESSION["code"] = $code;
		header('Location:../votes_speakers.php');
	} else {
		header('Location:../votes_wrongCode.php');
	}
	exit;
?>

