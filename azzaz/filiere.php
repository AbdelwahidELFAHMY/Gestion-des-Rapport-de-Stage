<!
    <titDOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="filiere.css">
    
</head>
<body bgcolor="aqua">
    <div class="azaz">
    <form action="filiere1.php" method="post">
     entrer la filiere:<input type="text" name="filiere1" placeholder="entrer la filiere" id="input0">
     <input type="submit" value="valider" id="input1">
    </form>
<div id="azaz1">    <a href="#" id="lienfiliere">afficher toutes les filieres enregistres sur la base de donne:</a><br>
</div>
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
    <input type="submit" value="valider" id="input2">
    </form>
    </div>
    </div>
    <script src="filiere.js"></script>
    <style>
        .azaz{
            margin-top: 70px;
            width: 50%;
            margin-left: 25%;
            border-radius: 10px;
            background-color: gray;
            padding: 40px;

        }
        #lienfiliere{
            margin-top: 70px;
        }
        #azaz1{
            margin-top: 100px;
        }
        #input0{
            margin-left: 30px;
            border-radius: 5px;
        }
        #input1{
            margin-left: 40px;
            border-radius: 5px;

        }
        #input1:hover{
            background-color: aqua;
        }
        #input2{
            margin-left: 70px;
            border-radius: 5px;
        }
        #input2:hover{
            background-color: aqua;
        }
    </style>
    
 
</body>
</html>
