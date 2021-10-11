<?php
class AgendaEvent
{
    private $id;
	private $day;
	private $month_fr;
	private $month_en;
	private $title_fr;
	private $title_en;
	private $info_fr;
	private $info_en;
	
	public function getId(){
		return $this->id;
	}
	
	public function getTitle(){
		if($_SESSION['lang'] == "en"){
			return $this->title_en;
		}
		return $this->title_fr;
	}
	
	public function getTitleFrench(){
		return $this->title_fr;
	}
	
	public function getTitleEnglish(){
		return $this->title_en;
	}
	
	public function getDay(){
		return $this->day;
	}
	
	public function getMonth(){
		if($_SESSION['lang'] == "en"){
			return $this->month_en;
		}
		return $this->month_fr;
	}
	
	public function getInfo(){
		if($_SESSION['lang'] == "en"){
			return $this->info_en;
		}
		return $this->info_fr;
	}
	
	public function getInfoFrench(){
		return $this->info_fr;
	}
	public function getInfoEnglish(){
		return $this->info_en;
	}
}
?>