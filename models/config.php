<?php
$host = 'localhost';  // Hostname (usually localhost for local development)
$dbname = 'task_management_db';  // Database name
$username = 'root';  // MySQL username (default: root)
$password = '';  // MySQL password (default: empty for XAMPP/WAMP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>
