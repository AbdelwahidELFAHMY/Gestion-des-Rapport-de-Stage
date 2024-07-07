<?php
// Chemin vers votre fichier PDF

// Connexion à la base de données (à remplacer avec vos propres informations de connexion)
$servername = "localhost";
$username = "root";
$password = "";
$database = "mydatabase";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
if(isset($_POST['choix'])) {
    echo "<h2>Options choisies :</h2>";
    foreach($_POST['choix'] as $valeur){
        echo "<p>$valeur</p>";
    }
} else {
    echo "<p>Aucune option sélectionnée.</p>";
}

// Définir la requête SQL à exécuter (à remplacer avec votre requête SQL)
$sql = "SELECT chemin_fichier
FROM rapport_stage
WHERE year(date_depot)= $valeur;";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Afficher tous les fichiers résultants
    while($row = $result->fetch_assoc()) {
        echo "<a href='" . $row["chemin_fichier"] . "' target='_blank'>" . basename($row["chemin_fichier"]) . "</a><br>";
    }
} else {
    // Si la requête n'a pas renvoyé de résultats
    echo "Aucun fichier trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();

// Utiliser ou afficher la variable contenant le résultat


?>





