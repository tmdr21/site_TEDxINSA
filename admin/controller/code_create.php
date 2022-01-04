<?php
  include('../authenticated.php');
  include('../../model/Connection.php');
	
    if(isset($_POST['code']) && isset($_POST['valide']))  {
	
      $code = $_POST['code'];
      $valid = $_POST['valide'];

      $voteKey = Connection::getInstance()->createCode($code, $valid);
      echo $voteKey;
    }
?>