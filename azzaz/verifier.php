<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$base_de_donnees = "mydatabase";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupération des données de l'utilisateur depuis le formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mot_de_passe = $_POST['pass'];

// Requête SQL pour récupérer le nom du rôle de l'utilisateur
$sql = "SELECT Nom_role
        FROM role
        WHERE ID_role IN (SELECT ID_role FROM utilisateurs WHERE Nom = '$nom' AND Prénom = '$prenom' AND Mot_passe = '$mot_de_passe')";

$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // Utilisateur trouvé, vérification du rôle
    $roles = array();
    while ($row = $resultat->fetch_assoc()) {
        $roles[] = $row['Nom_role'];
    }

    // Vérification si l'un des rôles est "étudiant"
    if (in_array("etudiant", $roles)) {
        // Redirection vers la page index.html
        header("Location: premierpg.html");
        exit;
    } else {
        // Autre action si le rôle n'est pas étudiant
        // Par exemple, afficher un message d'erreur
        echo "Vous n'êtes pas autorisé à accéder à cette page.";
    }
} else {
    // Aucun utilisateur trouvé, afficher un message d'erreur ou rediriger vers une page de connexion
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

$connexion->close();
?>

