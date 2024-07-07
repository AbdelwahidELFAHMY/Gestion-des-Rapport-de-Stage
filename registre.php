<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once 'connectionPage.php';

    
    $prenom = $_POST['Prenom'];
    $nom = $_POST['Nom'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];


    $sql = "INSERT INTO utilisateurs (Prénom, Nom, Email, Mot_passe,ID_role) VALUES ('$prenom', '$nom', '$email', '$password',2)";

    if ($conn->query($sql) === TRUE) {
        echo "<script type=\"text/javascript\"> alert('Utilisateur ajouté avec succès'); window.location='Page_registre_chef_departement.html';</script>";
    } else {
        echo "Erreur lors de l'enregistrement : " . $conn->error;
    }

    
    $conn->close();
}
?>
