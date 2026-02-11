<?php
function loadEnv($path) {
    if (file_exists($path)) {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $_ENV[trim($name)] = trim($value);
            }
        }
    }
}

loadEnv(__DIR__ . '/../.env');

$host = getenv('DB_HOST') ?: ($_ENV['DB_HOST'] ?? null);
$db   = getenv('DB_NAME') ?: ($_ENV['DB_NAME'] ?? null);
$user = getenv('DB_USER') ?: ($_ENV['DB_USER'] ?? null);
$pass = getenv('DB_PASS') ?: ($_ENV['DB_PASS'] ?? null);

if (!$host) {
    die("Erreur configuration : Database variables missing.");
}

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>