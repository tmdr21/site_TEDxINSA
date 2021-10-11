<?php
class Result
{
	private $idSpeaker;
	private $note;

	public function __construct($idSpeaker, $note)
    {
        $this->idSpeaker = $idSpeaker;
        $this->note = $note;
    }
	
	public function getIdSpeaker(){
		return $this->idSpeaker;
	}

	
	public function getNote(){
		return $this->note;
	}
}
?>