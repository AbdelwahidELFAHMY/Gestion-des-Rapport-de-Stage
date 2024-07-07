<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>