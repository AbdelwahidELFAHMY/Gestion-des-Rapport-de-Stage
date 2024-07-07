<?php
include_once('Connection.php');


// Requête pour récupérer les rapports de stage associés à l'utilisateur
$sql = "SELECT 
    rs.Titre_rapport AS Titre, 
    rs.Description_rapport AS Description, 
    rs.Date_depot AS Date, 
    rs.Chemin_fichier AS Chemin,
    u.Nom AS Nom_etudiant,
    u.Prénom AS Prénom_etudiant,
    f.Nom_filière AS Filière,
    n.Nom_niveau AS Niveau
FROM 
    rapport_stage rs
JOIN 
    rapport_etudiant re ON rs.ID_rapport = re.ID_rapport
JOIN 
    etudiant e ON re.ID_etudiant = e.ID_etudiant
JOIN 
    utilisateurs u ON e.ID_utilisateur = u.ID_utilisateur
JOIN 
    filière f ON e.ID_filière = f.ID_filière
JOIN 
    niveaux n ON e.ID_niveau = n.ID_niveau";

$result = $conn->query($sql);
$rapports = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rapport = array(
            "titre" => $row["Titre"],
            "description" => $row["Description"],
            "date" => $row["Date"],
            "Chemin" => $row["Chemin"],
            "Nom_Etu" => $row["Nom_etudiant"],
            "Prénom_Etu" => $row["Prénom_etudiant"],
            "Nom_filière" => $row["Filière"],
            "Nom_niveau" => $row["Niveau"]
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
