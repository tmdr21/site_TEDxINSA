<?php
class Member
{
    private $id;
	private $firstname;
	private $lastname;
	private $year;
	private $title_fr;
	private $title_en;
	private $photo;
	
	public function getId(){
		return $this->id;
	}
	
	public function getFirstname(){
		return $this->firstname;
	}
	
	public function getLastname(){
		return $this->lastname;
	}
	
	public function getYear(){
		return $this->year;
	}
	
	public function getTitle(){
		if($_SESSION['lang'] == "en"){
			return $this->title_en;
		}
		return $this->title_fr;
	}
	
	
	public function getFrenchTitle(){
		return $this->title_fr;
	}

	
	public function getEnglishTitle(){
		return $this->title_en;
	}
	public function getPhoto(){
		return $this->photo;
	}
}
?>