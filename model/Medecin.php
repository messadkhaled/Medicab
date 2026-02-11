<?php
class Medecin {
    private $id;
    private $nom;
    private $prenom;
    private $specialite;
    private $biographie;
    private $photo_url;
    private $id_service;

    public function __construct($id, $nom, $prenom, $spec, $bio, $photo, $id_service) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->specialite = $spec;
        $this->biographie = $bio;
        $this->photo_url = $photo;
        $this->id_service = $id_service;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNomComplet() { return $this->prenom . " " . $this->nom; } 
    public function getSpecialite() { return $this->specialite; }
    public function getBiographie() { return $this->biographie; }
    public function getPhotoUrl() { return $this->photo_url; }
}
?>