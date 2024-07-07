<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si une date a été sélectionnée
    if (isset($_POST["titret"]) && !empty($_POST["titret"])) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Récupérer la date sélectionnée
        $selectedDate = $_POST["titret"][0];
        echo $selectedDate;

        // Préparer une requête pour récupérer les chemins des fichiers pour la date sélectionnée
        $sql = "SELECT Chemin_fichier,Titre_rapport,ID_rapport,Description_rapport,Date_depot FROM rapport_stage WHERE Titre_rapport = '$selectedDate'";

        // Exécuter la requête
        $result = $conn->query($sql);
        

        // Afficher les chemins des fichiers
        if ($result->num_rows > 0) {
            echo '<p class="paragraph" >les chemins pour le titre selectione sont:</p>';
            while($row = $result->fetch_assoc()) {
                $file_path = $row["Chemin_fichier"];
                echo '<p> id_rapport:'.$row["ID_rapport"].'</p>';
                echo '<p>titre:           '.$row["Titre_rapport"].'</p>';
                echo '<p>description :           '.$row["Description_rapport"].'</p>';
                echo '<p>date depot:        '.$row["Date_depot"].'</p>';

                echo '<a href="' . $file_path . '" target="_blank">' . $file_path  .'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo '<a href="' . $file_path . '" download>' . basename("download") . '</a>';
               

               
                echo '<hr><hr>';
            }
        } else {
            echo "Aucun fichier trouvé pour la date sélectionnée.";
        }

        // Fermer la connexion à la base de données
        $conn->close();
    }}
    
?>
<style>
    .paragraph{
        font-size: large;
        text-align: center;
    }
</style>

    
</body>
</html>