<?php
require_once __DIR__ . '/Service.php';

class ServiceManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllServices() {
        $stmt = $this->pdo->query("SELECT * FROM Service ORDER BY Nom_service");
        $servicesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $servicesObjects = [];
        foreach ($servicesData as $data) {
            $servicesObjects[] = new Service(
                $data['id'], 
                $data['nom_service'], 
                $data['description']
            );
        }
        return $servicesObjects;
    }
    public function getServiceById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Service WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Service(
                $data['id'],
                $data['nom_service'], 
                $data['description']
            );
        }
        return null;
    }

    //  ajouter service
    public function addService($nom, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO Service (Nom_service, Description) VALUES (?, ?)");
        return $stmt->execute([$nom, $description]);
    }

    //  supprimer service
    public function deleteService($id) {
        $stmt = $this->pdo->prepare("DELETE FROM Service WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
?>