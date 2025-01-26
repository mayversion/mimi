<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            
            if (password_verify($password, $user["pwd"])) {
                
                session_start();
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_email"] = $user["email"];
                $_SESSION["first_name"] = $user["first_name"];
                $_SESSION["last_name"] = $user["last_name"];
                
                header("Location: http://localhost/web4/Projet webdev/mimi.php");
                exit();
            } else {
                
                echo "Invalid email or password. Please try again.";
            }
        } else {
            echo "Invalid email or password. Please try again.";
        }

        $pdo = null;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: http://localhost/web4/Projet webdev/mimi.php");
    exit();
}

