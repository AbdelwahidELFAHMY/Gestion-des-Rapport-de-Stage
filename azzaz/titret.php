<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="titre.css">
    <title>Document</title>
</head>
<body bgcolor="bleu">
    <div class="azaz">
    <form action="titre.php" method="post">
    titre:&nbsp;&nbsp;&nbsp;<input type="text" name="titre" placeholder="saisir le titre desire"> 
    &nbsp;&nbsp;&nbsp;<input type="submit" value="valider">
     
     </form>
     
    <div class="lien"><a href="#" id="lientitre" class="lienntitre">voir les titres disponibles</a></div>
    <div class="list">
    <div id="container">
        <form action="disponible.php" method="post">
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
    $sql = "SELECT Titre_rapport FROM rapport_stage";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Afficher chaque date sous forme d'un input checkbox
        while($row = $result->fetch_assoc()) {
            echo '<input type="radio" name="titret[]" value="' . $row["Titre_rapport"] . '">' . $row["Titre_rapport"] . '<br>';
        }
    } else {
        echo "0 résultats";
    }

    // Fermer la connexion à la base de données
    $conn->close();
    ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="valider">
 </div>

    
    </form>
    </div>
    <script src="titre.js"></script>
    </div>
    <style>
        .azaz.lien.lienntitre{
            background-color: blue;
            text-decoration: none;
            border-radius: 5px;
        }
        .azaz{
            margin-top: 40px;
            background-color: gray;
     
            align-items: center;
           border-radius: 20px;
           width: 50%;
           padding: 30px;
           margin-left: 25%;
        }
        body{
            background-color: bleu;
        }
      
        input{
            border-radius: 5px;
        }
        a{
            margin-top: 300px;
        }
        .azaz.list.lienntitre{
            margin-top: 70px;
            text-decoration: none;
            background-color: greenyellow;
            border-radius: 5px;
        }
        #lientitre{
            margin-top: 70px;
        }
        .lien{
            margin-top: 70px;
        }

    </style>
   
    
</body>

</html>