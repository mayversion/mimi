<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO emails (email) VALUES (:email)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);

        if ($stmt->execute()) {
            echo "Thank you for subscribing to our newsletter!";
            header("Location: http://localhost/web4/Projet webdev/mimi.php");
            
         
        } else {
            echo "An error occurred. Please try again.";}
            header("Location: http://localhost/web4/Projet webdev/mimi.php");
            
        $pdo = null;
        $stmt = null;

    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { 
            echo "This email is already subscribed.";
        } else {
            die("Error: " . $e->getMessage());
        }
    }
} else {
    echo "Invalid request method.";
}

