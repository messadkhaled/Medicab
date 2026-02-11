<?php
class Service {
    private $id;
    private $nom_service;
    private $description;

    public function __construct($id, $nom, $desc) {
        $this->id = $id;
        $this->nom_service = $nom;
        $this->description = $desc;
    }

    public function getId() { return $this->id; }
    public function getNomService() { return $this->nom_service; }
    public function getDescription() { return $this->description; }
}
?>