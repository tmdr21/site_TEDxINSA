<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$agenda = Connection::getInstance()->deleteAgenda($id);
		echo $agenda;
	}
	
?>