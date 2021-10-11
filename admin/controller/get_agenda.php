<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$agenda = Connection::getInstance()->selectAgendaById($id);
		print_r($agenda);
	}
?>			
