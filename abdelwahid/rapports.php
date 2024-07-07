<?php

include_once('ConnectionBD.php');

session_start();

if (!isset($_SESSION['ID_utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: Page_Login.html");
    exit;
}
// Récupérez l'email à partir de la session
$ID_utilisateur = $_SESSION['ID_utilisateur'];

// Requête pour récupérer les rapports de filière associés à l'email du secrétaire
$sql = "SELECT * FROM rapport_stage  WHERE ID_rapport IN (
        SELECT ID_rapport FROM rapport_etudiant WHERE ID_etudiant IN (
        SELECT ID_etudiant FROM etudiant WHERE ID_filière = (
        SELECT ID_filière  FROM secretaire_departement
        WHERE ID_utilisateur = '$ID_utilisateur')));";
$result = $conn->query($sql);
$rapports = array();
if ($result->num_rows > 0) {
    // Récupération des rapports de filière
    while ($row = $result->fetch_assoc()) {
        $rapport = array(
            "titre" => $row["Titre_rapport"],
            "description" => $row["Description_rapport"],
            "date" => $row["Date_depot"],
            "Chemin"=> $row["Chemin_fichier"],
            "ID_rapport"=> $row["ID_rapport"],
        );
        array_push($rapports, $rapport);
    }
} else {
    $rapports = array();
}

// Conversion des résultats en format JSON
echo json_encode($rapports);

$conn->close();
?>
