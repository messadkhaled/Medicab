<?php
require_once 'model/db_connection.php'; 

function getServices() {
    global $pdo; 
    $stmt = $pdo->query("SELECT * FROM service"); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>