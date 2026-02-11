<?php
require_once __DIR__ . '/Medecin.php';

class MedecinManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllMedecins() {
        $sql = "SELECT m.*, s.Nom_service 
                FROM Medecin m 
                JOIN Service s ON m.id_service = s.Id 
                ORDER BY m.nom";
        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMedecinsByServiceId($serviceId) {
        $stmt = $this->pdo->prepare("SELECT * FROM Medecin WHERE id_service = ?");
        $stmt->execute([$serviceId]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $objects = [];
        foreach($data as $d) {
            $objects[] = new Medecin($d['id'], $d['nom'], $d['prenom'], $d['specialite'], $d['biographie'], $d['photo_url'], $d['id_service']);
        }
        return $objects;
    }

    // ajouter docteur
    public function addMedecin($nom, $prenom, $spec, $bio, $photo, $id_service) {
        $sql = "INSERT INTO Medecin (Nom, Prenom, specialite, biographie, photo_url, id_service) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom, $prenom, $spec, $bio, $photo, $id_service]);
    }

    //  supprimer docteur
    public function deleteMedecin($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Medecin WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
?>