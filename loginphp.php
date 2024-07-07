<?php

include_once('connectionPage.php');

$email = $_POST['Email'];
$password = $_POST['Password'];
$sql = "SELECT * FROM utilisateurs WHERE Email = '$email' AND Mot_passe = '$password' AND ID_role = 2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nom = $row["Nom"];
    $id_Utilisateur= $row["ID_utilisateur"];
    $prenom = $row["Prénom"];
    session_start();
    $_SESSION['ID_utilisateur'] = $row["ID_utilisateur"];
    header("Location: InterfaceDepot.php?nom=$prenom $nom");
} else {
    
    echo "Adresse e-mail ou mot de passe incorrect.";
}

$conn->close();
?>
