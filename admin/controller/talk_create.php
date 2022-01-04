<?php
	include('../authenticated.php');
	include('../../model/Connection.php');
	
    if(isset($_POST['name']) && isset($_POST['video']) && isset($_POST['title_fr']) 
		&& isset($_POST['title_en']) && isset($_POST['description_fr']) && isset($_POST['description_en'])
		&& isset($_POST['year']) && isset($_POST['lang']) && isset($_POST['photo']) 
		&& isset($_POST['facebook']) && isset($_POST['twitter']) && isset($_POST['linkedin']) 
		&& isset($_POST['youtube']) && isset($_POST['instagram']) && isset($_POST['website'])){

		$name = utf8_decode($_POST['name']);
		$video = $_POST['video'];
		$title_fr = utf8_decode($_POST['title_fr']);
		$title_en = utf8_decode($_POST['title_en']);
		$description_fr = utf8_decode($_POST['description_fr']);
		$description_en = utf8_decode($_POST['description_en']);
		$year = $_POST['year'];
		$lang = $_POST['lang'];
		$photo = str_replace(" ", "_","datas/talk/".$year."/".$name.".jpg");
		$facebook = $_POST['facebook'];
		$twitter = $_POST['twitter'];
		$linkedin = $_POST['linkedin'];
		$youtube = $_POST['youtube'];
		$instagram = $_POST['instagram'];
		$website = $_POST['website'];

		// If path doesn't exists, create it
		if(!is_dir("../../datas/talk/".$year)){
			mkdir("../../datas/talk/".$year, 0755, true);
		}
		if(isset($_FILES['photo_file'])){
			// Register photo in file path
			move_uploaded_file($_FILES['photo_file']['tmp_name'], "../../".$photo); 
		}else{
			// If no photo choosen, put default
			copy("../../img/img_default.jpg", "../../".$photo);
		}

		$talk = Connection::getInstance()->createTalk($name, $video, $title_fr, $title_en, $description_fr, $description_en, $year, $lang, $photo, $facebook, $twitter, $linkedin, $youtube, $instagram, $website);
		echo $talk;
    }
?>