<?php  
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT); 
    $date_naissance = $_POST["dob"];

    try {
        require_once "dbh.inc.php";
        
        $query = "SELECT email FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: http://localhost/web4/Projet%20webdev/signin.php?error=email_exists");
            exit();
        } else {
            
            $query = "INSERT INTO users (first_name, last_name, email, pwd, date_naissance) 
                      VALUES (:first_name, :last_name, :email, :pwd, :date_naissance)";
            
            $stmt = $pdo->prepare($query);
            
            $stmt->bindParam(":first_name", $first_name);
            $stmt->bindParam(":last_name", $last_name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":pwd", $pwd);
            $stmt->bindParam(":date_naissance", $date_naissance);

            $stmt->execute();
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            
            $pdo = null;
            $stmt = null;
            
            header("Location: http://localhost/web4/Projet%20webdev/mimi.php");
            exit(); 
        }
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: http://localhost/web4/Projet%20webdev/mimi.php");
    exit();
}
?>
