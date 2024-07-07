<!
    <titDOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <form action="filiere1.php" method="post">
     entrer la filiere:<input type="text" name="filiere1" placeholder="entrer la filiere">
     <input type="submit" value="valider">
    </form>

    <a href="#" id="lienfiliere">afficher toutes les filieres enregistres sur la base de donne:</a><br>
    <div id="filiere">
        <form action="filiereshower.php" method="post">
    <?php
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

    // Requête pour récupérer toutes les dates depuis la table rapport_de_stage
    $sql = "SELECT Nom_filière FROM filière";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Afficher chaque date sous forme d'un input checkbox
        while($row = $result->fetch_assoc()) {
            echo '<input type="radio" name="filiere2[]" value="' . $row["Nom_filière"] . '">' . $row["Nom_filière"] . '<br>';
        }
    } else {
        echo "0 résultats";
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
    <input type="submit" value="valider">
    </form>
    </div>
    <script src="filiere.js"></script>
    
 
</body>
</html>
