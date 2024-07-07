<!
    <titDOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="motclstyle.css">
</head>
<body bgcolor="aqua">
    <div class="azaz">
    <form action="motcle.php" method="post">
     entrer le mot cle:<input type="text" placeholder="entrer le mot cle" name="motcle" id="input0">
     <input type="submit" value="valider" id="input1">
    </form>
    <div id="azaz1">

    <a href="#" id="lienmotcle">afficher toutes les dates enregistres sur la base de donne:</a><br>
    </div>

    <div id="container">
        <form action="motcle1.php" method="post">
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
    $sql = "SELECT ID_rapport FROM rapport_stage";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Afficher chaque date sous forme d'un input checkbox
        while($row = $result->fetch_assoc()) {
            echo '<input type="radio" name="mtcle[]" value="' . $row["ID_rapport"] . '">' . $row["ID_rapport"] . '<br>';
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
    <script src="showmotcle.js"></script>
    </div>
    <style>
        .azaz{
            padding: 30px;
            width: 50%;
            margin-left: 25%;
            background-color: gray;
            margin-top: 100px;
            border-radius: 10px;
        }
        #azaz1{
            margin-top: 100px;
        }
        #input2{
            margin-left: 50px;
            border-radius: 5px;

        }
        #input2:hover{
            background-color:aqua;
        }
        #input0{
            margin-left: 40px;
            border-left: 30px;
            border-radius: 5px;

        }
        #input1{
            margin-left: 40px;
            border-radius: 5px;
        }
        #input1:hover{
            background-color: aqua;

        }
    </style>
    
 
</body>
</html>
