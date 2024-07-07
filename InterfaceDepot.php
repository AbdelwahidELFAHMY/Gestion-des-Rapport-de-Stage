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
        <div>
            <pre> welcomme back choisir la fonctionnalite a gauche
                
            </pre>
     </div>
     <div>
     <?php
session_start(); // Démarrer la session

// Vérifier si l'ID de l'utilisateur est défini dans la session
if (isset($_SESSION['ID_utilisateur'])) {
    $id_utilisateur = $_SESSION['ID_utilisateur'];

    // Connectez-vous à la base de données et effectuez votre requête SQL pour récupérer les autres informations de l'utilisateur
    include_once 'connectionPage.php'; // Inclure le fichier de connexion à la base de données

    // Requête pour récupérer les autres informations de l'utilisateur
    $sql = "SELECT Nom, Prénom, Email FROM utilisateurs WHERE ID_utilisateur = '$id_utilisateur'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<br>";
        echo "<h2>Informations de l'utilisateur :</h2>";
        echo "<br>";
        echo "<p>Nom : " . $row['Nom'] . "</p>";
        echo "<br>";
        echo "<p>Prénom : " . $row['Prénom'] . "</p>";
        echo "<br>";
        echo "<p>Email : " . $row['Email'] . "</p>";
        // Ajoutez ici d'autres informations à afficher si nécessaire
    } else {
        echo "Aucun résultat trouvé pour cet ID d'utilisateur.";
    }
} else {
    // Gérer le cas où l'ID de l'utilisateur n'est pas défini dans la session
    echo "ID d'utilisateur non défini.";
}
?>

     </div>
    </div>
</main>
<footer>
    <div class="contact-info">
        <div>
            <h2>Contact</h2>
            <p>Ecole Nationale des Sciences Appliquées Agadir – Maroc<br>
                Tél : +212 (0)52822 83 13<br>
                Email : contact_ensa@uiz.ac.ma
            </p>
        </div>
        
        <div>
            <h2>ENSA Agadir</h2>
            <p>En 1999, l’Université IBN ZOHR innove en ouvrant la première
                école d’ingénieurs de la région : l’ENSA-AGADIR. C’est un établissement de formation 
                d’ingénieur qui offre, en cinq ans, aux jeunes bacheliers scrupuleusement sélectionnés,
                une formation professionnelle, diversifiée, complète et relativement polyvalente.
            </p>
        </div>
    </div>
    </a>
    <div class="copyright">
        <p>© 2017 ENSA AGADIR 2024 Mon Site Web - Tous droits réservés</p>
    </div>
</footer>
</body>
</html>
