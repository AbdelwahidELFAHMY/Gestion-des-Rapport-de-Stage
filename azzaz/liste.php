<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}



// Définir la requête SQL à exécuter (à remplacer avec votre requête SQL)

$sql = "SELECT chemin_fichier FROM rapport_stage";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats

if ($result->num_rows > 0) {
    // Afficher tous les fichiers résultants
  
    while($row = $result->fetch_assoc()) {
        echo "<div class='fil'><a href='" . $row["chemin_fichier"] . "' target='_blank'>" . basename($row["chemin_fichier"]) . "</a><br></div>";
        
    }

} else {
    // Si la requête n'a pas renvoyé de résultats
    echo "Aucun fichier trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
// Vérifier si le formulaire a été soumis


?>
<style>

.fil{
    display:flex ;
    height: 30px;
background-color: gray;
margin-bottom: 20px;
font-size: 20px;
}
</style>