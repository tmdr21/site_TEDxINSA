<?php
class Sponsor
{
    private $id;
	private $name;
	private $photo;
	private $description_fr;
	private $description_en;
	private $year;
	private $link;
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getPhoto(){
		return $this->photo;
	}
	
	public function getDescription(){
		if($_SESSION['lang'] == "en"){
			return $this->description_en;
		}
		return $this->description_fr;
	}
		
	public function getFrenchDescription(){
		return $this->description_fr;
	}

	public function getEnglishDescription(){
		return $this->description_en;
	}

	public function getYear(){
		return $this->year;
	}
	
	public function getLink(){
		return $this->link;
	}
}
?>