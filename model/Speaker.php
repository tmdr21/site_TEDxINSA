<?php
class Speaker
{
    private $id;
	private $nom;
	private $prenom;
	private $titre;
	private $descriptif;
	private $photo;

	/*public function __construct($id, $nom, $prenom, $titre, $descriptif, $photo)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->titre = $titre;
        $this->descriptif = $descriptif;
        $this->photo = $photo;
    }*/
	
	public function getId(){
		return $this->id;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function getTitre(){
		return $this->titre;
	}
	
	public function getDescriptif(){
		return $this->descriptif;
	}
	
	public function getPhoto(){
		return $this->photo;
	}
}
?>