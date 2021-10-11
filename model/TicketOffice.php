<?php
	class TicketOffice
	{
		private $idTicketOffice;
		private $available;
		private $url;


		public function getAvailable(){
			return $this->available;
		}

		public function getUrl(){
			return $this->url;
		}
	}
?>