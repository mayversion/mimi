<?php
$dsn = "mysql:host=localhost";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createdatabase = "CREATE DATABASE IF NOT EXISTS may";
    $pdo->exec($createdatabase);

    $pdo->exec("USE may");

    $createtable = "CREATE TABLE IF NOT EXISTS Comment (
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        sujet VARCHAR(255) NOT NULL,
        msg TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createtable);
    $createEmailsTable = "CREATE TABLE IF NOT EXISTS emails (
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createEmailsTable);

    $createusers = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        pwd VARCHAR(255) NOT NULL,
        date_naissance DATE NOT NULL
    )";
    $pdo->exec($createusers);

    $createClothesTable = "CREATE TABLE IF NOT EXISTS vetement (
        id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        genre VARCHAR(255) NOT NULL,
        price INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        image1 VARCHAR(255),
        image2 VARCHAR(255),
        image3 VARCHAR(255),
        image4 VARCHAR(255)
    )";
    $pdo->exec($createClothesTable);
    $createDescriptionTable = "CREATE TABLE IF NOT EXISTS description ( 
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    vetement_id INT NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (vetement_id) REFERENCES vetement(id) )";
    $pdo->exec($createDescriptionTable);


} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
