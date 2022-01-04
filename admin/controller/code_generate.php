<?php
  include('../authenticated.php');
  include('../../model/Connection.php');
	
    if(isset($_POST['number']))  {
	
      $number = $_POST['number'];
      
      $voteKey = Connection::getInstance()->generateCode($number);
      echo $voteKey;
    }
?>