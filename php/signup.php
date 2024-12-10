<?php
require 'database.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit; 
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit; 
        
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $passwordHash]);

        
        header("Location: ../login.html");
        exit; 
    } catch (PDOException $e) {
        
        error_log("Error: " . $e->getMessage());
        
        echo "Something went wrong. Please try again later.";
    }
}
?>
