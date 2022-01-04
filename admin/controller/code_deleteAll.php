<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(true){
		$voteKey = Connection::getInstance()->deleteAllCodes();
		echo $voteKey;
	}
	
?>