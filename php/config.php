<?php
$host = 'localhost';
$dbname = 'kiddo_learn';
$user = 'root';      // Default user in XAMPP
$password = '';      // Default password is empty in XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>