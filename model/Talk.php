<?php
class Talk
{
    private $id;
	private $name;
	private $video;
	private $photo;
	private $description_fr;
	private $description_en;
	private $year;
	private $title_fr;
	private $title_en;
	private $facebook;
	private $twitter;
	private $linkedin;
	private $youtube;
	private $instagram;
	private $website;
	
	public function getId(){
		return $this->id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getVideo(){
		return $this->video;
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

	public function getFacebook(){
		return $this->facebook;
	}
	
	public function getTwitter(){
		return $this->twitter;
	}
	
	public function getLinkedin(){
		return $this->linkedin;
	}
	
	public function getYoutube(){
		return $this->youtube;
	}
	
	public function getInstagram(){
		return $this->instagram;
	}
	
	public function getWebsite(){
		return $this->website;
	}
	
	public function getLanguage(){
		return $this->lang;
	}
}
?>