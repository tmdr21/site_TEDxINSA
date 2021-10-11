<?php
	include('../model/Connection.php');
	session_start();
	$code = $_SESSION["code"];
	
	$speakers = Connection::getInstance()->selectAllSpeakers();
	
	if(Connection::getInstance()->checkCode($code)){
		
		if(Connection::getInstance()->useCode($code)){
			$error = false;
			foreach($speakers as $speaker){
				$result = new Result($speaker->getId(), $_POST["noteS".$speaker->getId()]);
				if(!Connection::getInstance()->insertResult($result)){
					$error = true;
				}
			}
			if($error){
				echo 'votes_erreur.php';
			}else{
				echo 'votes_merci.php';
			}
		}else{
			echo 'votes_erreur.php';
		}
	} else {
		echo 'votes_wrongCode.php';
	}
	
	exit;
?>