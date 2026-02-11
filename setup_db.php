<?php
require_once 'model/db_connection.php';

try {
    $sql = file_get_contents('database.sql');
    
    $pdo->exec($sql);
    
    echo "<h1>Succès !</h1>";
    echo "<p>Tables créées et Admin ajouté.</p>";
    
} catch (PDOException $e) {
    echo "<h1>Erreur</h1>";
    echo $e->getMessage();
}
?>