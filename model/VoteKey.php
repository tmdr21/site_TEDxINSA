<?php
class VoteKey
{
	private $id;
	private $code;
	private $valid;

	// public function __construct($id, $code, $valid)
    // {
        // $this->id = $id;
        // $this->code = $code;
        // $this->valid = $valid;
    // }
	
	public function getId(){
		return $this->id;
	}
	
	public function getCode(){
		return $this->code;
	}
	
	public function isValid(){
		return $this->valid;
	}
}
?>