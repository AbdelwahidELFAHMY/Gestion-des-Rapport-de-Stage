<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    include_once('ConnectionBD.php');
    
    
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $email = $_POST["Email"];
    $motdepasse = $_POST["Mot_passe"];
    $filiere = $_POST["filiere"];


    // Préparer la requête SQL pour insérer un nouvel utilisateur dans la table "Utilisateurs"
    $sql = "INSERT INTO utilisateurs (Nom, Prénom, Email, Mot_passe, ID_role) VALUES (?, ?, ?, ?, 3)";

    // Préparer la requête SQL pour insérer un nouveau secrétaire dans la table "Secretaires_Departement"
    $sqlSec = "INSERT INTO secretaire_departement (ID_utilisateur, ID_filière) VALUES (?, ?)";

    // Préparer et exécuter la première requête SQL pour insérer un nouvel utilisateur
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nom, $prenom, $email, $motdepasse);
    $stmt->execute();

    // Vérifier si l'insertion a réussi
    if ($stmt->affected_rows > 0) {
        // Récupérer l'ID de l'utilisateur nouvellement inséré
        $idUtilisateur = $conn->insert_id;

        // Préparer et exécuter la deuxième requête SQL pour insérer un nouveau secrétaire
        $stmtSec = $conn->prepare($sqlSec);
        $stmtSec->bind_param("ii", $idUtilisateur, $filiere);
        $stmtSec->execute();

        // Vérifier si l'insertion du secrétaire a réussi
        if ($stmtSec->affected_rows > 0) {
            echo "Secrétaire ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du secrétaire.";
        }
    } else {
        echo "Erreur lors de l'ajout de l'utilisateur.";
    }

    // Fermer les requêtes préparées et la connexion à la base de données
    $stmt->close();
    $stmtSec->close();
    $conn->close();
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("Location: PageCreerCompte.php");
    exit;
}
?>
