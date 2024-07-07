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
    if (!empty($_POST["motcle"])) {
        // Récupérer le contenu du champ "titre"
        $motcle = $_POST["motcle"];
        // Afficher le titre
        echo "mot cle saisi est : " . $motcle.'<br>';
    } else {
        // Si le champ "titre" est vide
        echo "Veuillez saisir un mot cle.";
    }}


// Définir la requête SQL à exécuter (à remplacer avec votre requête SQL)
$sql = "SELECT Chemin_fichier,Titre_rapport,ID_rapport,Description_rapport,Date_depot
FROM rapport_stage
WHERE ID_rapport= $motcle;";

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
        echo "<a href='" . $row["Chemin_fichier"] . "' target='_blank'>" . basename($row["Chemin_fichier"]) . "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo '<a href="' . $row["Chemin_fichier"] . '" download>' . basename("download") . '</a>';
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