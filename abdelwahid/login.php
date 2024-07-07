<?php

include_once('ConnectionBD.php');


// Récupérer les données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];

// Vérifier les informations d'authentification
$sql = "SELECT * FROM utilisateurs WHERE Email = '$email' AND Mot_passe = '$password' AND ID_role = 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nom = $row["Nom"];
    $prenom = $row["Prénom"];
    session_start();
    $_SESSION['ID_utilisateur'] = $row["ID_utilisateur"];
    header("Location: raport_list.html?nom=$prenom $nom");
} else {
    // Informer l'utilisateur que les informations d'authentification sont incorrectes
    echo "Adresse e-mail ou mot de passe incorrect.";
}


// Fermer la connexion à la base de données
$conn->close();
?>
