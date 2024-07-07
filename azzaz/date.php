<!
    <titDOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="date.css">
</head>
<body bgcolor="aqua">
    <div class="azaz">
    <form action="dateshower1.php" method="post">
     entrer la date:<input type="date" placeholder="entrer la date" name="data" id="input0">
     <input type="submit" value="valider" id="input1">
    </form>

    <div id="azaz1">
    <a href="#" id="liendate" class="input3">afficher toutes les dates enregistres sur la base de donne:</a><br>
    </div>
    <div id="dateshower">
        <form action="dateshower.php" method="post">
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
    $sql = "SELECT date_depot FROM rapport_stage";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Afficher chaque date sous forme d'un input checkbox
        while($row = $result->fetch_assoc()) {
            echo '<input type="radio" name="dates[]" value="' . $row["date_depot"] . '">' . $row["date_depot"] . '<br>';
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
    <script src="date.js"></script>

    <style>
        .azaz{
            margin-top: 70px;
            width: 50%;
            margin-left: 25%;
            border-radius: 10px;
            padding: 40px;
            background-color: gray;
        }
        #input0{
            margin-left: 40px;
            border-radius: 5px;
        }
        #azaz1{
            margin-top: 70px;
        }
        #input1{
            margin-left:40px ;
            border-radius: 5px;
        }
        #input1:hover{
            background-color: aqua;
        }
       .azaz.input3{
        margin-top: 100px;
       }
    </style>
    
 
</body>
</html>
