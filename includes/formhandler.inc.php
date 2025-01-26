<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username=$_POST["name"];
    $email=$_POST["email"];
    $sujet=$_POST["sujet"];
    $msg=$_POST["msg"];

    try{
       require_once "dbh.inc.php";
       $query ="INSERT INTO Comment (username,email,sujet,msg) VALUES
       (:username, :email, :sujet,:msg);";
       $stmt=$pdo->prepare($query);
       $stmt->bindParam(":username", $username);
       
       $stmt->bindParam(":email", $email);
       $stmt->bindParam(":sujet", $sujet);
       $stmt->bindParam(":msg", $msg);

       $stmt->execute();
       $pdo=null;
       $stmt=null;
       header("Location:http://localhost/web4/Projet%20webdev/contact.php");
       die();



    }catch(PDOException $e){
        
        die("Error: " . $e->getMessage());
        

    }
    

}
else{
    header("Location:../contact.php");
}

