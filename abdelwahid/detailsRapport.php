<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du rapport</title>
    <link rel="stylesheet" href="DetailsRapports.css">
</head>
<body>
    <div class="container">
        <?php
        
        include_once('ConnectionBD.php');

        // Vérifier si l'ID du rapport est passé en paramètre dans l'URL
        if(isset($_GET['id'])) {
            // Récupérer l'ID du rapport depuis l'URL
            $rapportId = $_GET['id'];

            // Requête SQL pour récupérer les détails du rapport
            
            $sql = "SELECT 
            E.ID_etudiant,
            U.Nom AS Nom_etudiant,
            U.Prénom AS Prénom_etudiant,
            F.Nom_filière AS Filiere_etudiant,
            N.Nom_niveau AS Niveau_etudiant,
            R.Titre_rapport,
            R.Description_rapport,
            R.Date_depot
        FROM 
            rapport_etudiant RE
        INNER JOIN 
            rapport_stage R ON RE.ID_rapport = R.ID_rapport
        INNER JOIN 
            etudiant E ON RE.ID_etudiant = E.ID_etudiant
        INNER JOIN 
            utilisateurs U ON E.ID_utilisateur = U.ID_utilisateur
        INNER JOIN 
            filière F ON E.ID_filière = F.ID_filière
        INNER JOIN 
            niveaux N ON E.ID_niveau = N.ID_niveau
        WHERE 
            R.ID_rapport = '$rapportId';";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher les détails du rapport
                $row = $result->fetch_assoc();
                    echo "<h1>Détails du rapport</h1>";
                    echo "<div><strong>Titre du rapport: </strong> " . $row["Titre_rapport"] . "</div>";
                    echo "<div><strong>Description du rapport: </strong> " . $row["Description_rapport"] . "</div>";
                    echo "<div><strong>Date de dépôt du rapport: </strong> " . $row["Date_depot"] . "</div>";
                    echo "<div><strong>Nom de l'étudiant: </strong> " . $row["Nom_etudiant"] . "</div>";
                    echo "<div><strong>Prénom de l'étudiant: </strong> " . $row["Prénom_etudiant"] . "</div>";
                    echo "<div><strong>Niveau de l'étudiant: </strong> " . $row["Niveau_etudiant"] . "</div>";
                    echo "<div><strong>Filière de l'étudiant: </strong> " . $row["Filiere_etudiant"] . "</div>";
            } else {
                echo "<p>Aucun détail de rapport trouvé pour l'ID de rapport spécifié.</p>";
            }
        } else {
            // Si aucun ID de rapport n'est passé en paramètre dans l'URL, afficher un message d'erreur ou rediriger l'utilisateur
            echo "<p>Aucun ID de rapport trouvé dans l'URL.</p>";
        }

        // Fermer la connexion à la base de données
        $conn->close();
        ?>
    </div>
</body>
</html>

