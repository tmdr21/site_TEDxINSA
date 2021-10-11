<?php
	$email = $_POST['email'];
	$title = $_POST['title'];
	if(!isset($title)){
		$title = "[CONTACT]";
	}
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	if(isset($_POST['teamChoice'])){
		$teamChoice = $_POST['teamChoice'];
		$message = "Intéressé par : ". implode( ", ", $teamChoice )."\r\r".$message;
		echo $message;
	}
	
	if($message != ""){
		if($subject == "[TEAM]"){
			mail("contact@tedxinsa.com" , $title.' '.$subject." venant de ".$email , $message );
		}else if($subject == "[SPEAKER]"){
			mail("speaker@tedxinsa.com" , $title.' '.$subject." venant de ".$email , $message );
		}else if($subject == "[SPONSOR]"){
			mail("sponsor@tedxinsa.com" , $title.' '.$subject." venant de ".$email , $message );
		}else if($subject == "[CONTACT]"){
			mail("contact@tedxinsa.com" , $title.' '.$subject." venant de ".$email , $message );
		}
	}
	
	$location = $_POST['location'];
	$query = parse_url($location, PHP_URL_QUERY);
	if ($query) {
		$location .= '&success=1';
	} else {
		$location .= '?success=1';
	}
	
	header('Location: '.$location);
	exit;
?>