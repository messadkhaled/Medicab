<?php
require_once __DIR__ . '/db_connection.php'; 

class UtilisateurManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAdmins() {
        $stmt = $this->pdo->query("SELECT * FROM Utilisateur ORDER BY nom");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAdmin($nom, $prenom, $email, $password) {
        $sql = "INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom, $prenom, $email, $password]);
    }

    public function deleteAdmin($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Utilisateur WHERE id_user = ?");
        return $stmt->execute([$id]);
    }
}
?>