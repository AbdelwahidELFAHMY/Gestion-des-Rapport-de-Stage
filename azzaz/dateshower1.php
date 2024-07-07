<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ "titre" a été rempli
    if (!empty($_POST["data"])) {
        // Récupérer le contenu du champ "titre"
        $titre = $_POST["data"];
        // Afficher le titre
        echo "Le date saisi est : " . $titre;
    } else {
        // Si le champ "titre" est vide
        echo "Veuillez saisir une date.";
    }}


// Définir la requête SQL à exécuter (à remplacer avec votre requête SQL)
$sql = "SELECT Chemin_fichier,Titre_rapport,ID_rapport,Description_rapport,Date_depot
FROM rapport_stage
WHERE Date_depot= '$titre';";

// Exécuter la requête SQL
$result = $conn->query($sql);

// Vérifier si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Afficher tous les fichiers résultants
    while($row = $result->fetch_assoc()) {
        echo '<p> id_rapport:'.$row["ID_rapport"].'</p>';
        echo '<p>titre:           '.$row["Titre_rapport"].'</p>';
        echo '<p>description :           '.$row["Description_rapport"].'</p>';
        echo '<p>date depot:        '.$row["Date_depot"].'</p>';
        echo "<div class='fil'><a href='" . $row["Chemin_fichier"] . "' target='_blank'>" . basename($row["Chemin_fichier"]) . "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo '<a href="' .$row["Chemin_fichier"] . '" download>' . basename("download") . '</a>';
        echo '<hr><hr>';

    }
} else {
    // Si la requête n'a pas renvoyé de résultats
    echo "Aucun fichier trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
// Vérifier si le formulaire a été soumis


?>
</body>
</html>
