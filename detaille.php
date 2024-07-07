<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="InterfaceDepot.css">
    <title>Document</title>
</head>
<body>
<main>
    <div class="barre1">
        <a href="InterfaceDepot.php"><button class="btn">page Principal</button></a>
        <br>
        <br>
        <br>
        <a href="ajouterRapport.html"><button class="btn">ajouter un rapport</button></a>
        <br>
        <br>
        <br>
        <a href="afficherRapports.html"><button class="btn">afficher les rapports</button></a>
    </div>

    <div class="barre2">
        <div class="detaille2" >
            <pre> welcome au Page  de modifications: </pre>
     </div>
     <br><br>
<div class="detaille">
<?php
include_once 'connectionPage.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["detaille"])) {
    $id_rapport = $_POST["ID_rapport"];

    // Requête pour récupérer les informations de l'étudiant ayant écrit le rapport
    $sql = "SELECT U.Nom, U.Prénom, U.Email, F.Nom_filière, N.Nom_niveau
    FROM rapport_stage RS
    INNER JOIN rapport_etudiant RE ON RS.ID_rapport = RE.ID_rapport
    INNER JOIN etudiant E ON RE.ID_etudiant = E.ID_etudiant
    INNER JOIN utilisateurs U ON E.ID_utilisateur = U.ID_utilisateur
    INNER JOIN filière F ON E.ID_filière = F.ID_filière
    INNER JOIN niveaux N ON E.ID_niveau = N.ID_niveau
    WHERE RS.ID_rapport = '$id_rapport'";
    
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<br>";
        echo "<h2>Informations de l'étudiant :</h2>";
        echo "<br>";
        echo "<p>Nom : " . $row['Nom'] . "</p>";
        echo "<br>";
        echo "<p>Prénom : " . $row['Prénom'] . "</p>";
        echo "<br>";
        echo "<p>Email : " . $row['Email'] . "</p>";
        echo "<br>";
        echo "<p>Filière : " . $row['Nom_filière'] . "</p>";
        echo "<br>";
        echo "<p>Niveau : " . $row['Nom_niveau'] . "</p>";
        // Ajoutez ici d'autres informations à afficher si nécessaire
    } else {
        echo "Aucune information trouvée pour ce rapport.";
    }
}
?>


</div>
</main>

<footer>
    <div class="contact-info">
        <div>
            <h2>Contact</h2>
            <p> Ecole Nationale des Sciences Appliquées Agadir – Maroc<br>
                Tél : +212 (0)52822 83 13<br>
                Email : contact_ensa@uiz.ac.ma
            </p>
        </div>
        
        <div>
            <h2>ENSA Agadir</h2>
            <p> En 1999, l’Université IBN ZOHR innove en ouvrant la première
                école d’ingénieurs de la région : l’ENSA-AGADIR. C’est un établissement de formation 
                d’ingénieur qui offre, en cinq ans, aux jeunes bacheliers scrupuleusement sélectionnés,
                une formation professionnelle, diversifiée, complète et relativement polyvalente.
            </p>
        </div>
    </div>
    
    <div class="copyright">
        <p>© 2017 ENSA AGADIR 2024 Mon Site Web - Tous droits réservés</p>
    </div>
</footer>

</body>
</html>






