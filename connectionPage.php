<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Créer une connexion à la base de données
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$db=mysqli_select_db($conn, $dbname); 
if(!$db) {
    die("database n'est pas selectionnés". mysqli_connect_error());
} 

?>