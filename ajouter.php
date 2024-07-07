    <?php
    // Informations de connexion à la base de données       
    include_once 'connectionPage.php';

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Enregistrer"])) {
        $Titre_rapport = $_POST['Titre_rapport'];
        $Description_rapport = $_POST['Description_rapport'];
        $Date_depot = $_POST['Date_depot'];
        $Chemin_fichier = $_POST['Chemin_fichier'];

        $sql = "INSERT INTO rapport_stage (Titre_rapport, Description_rapport, Date_depot, Chemin_fichier)
                VALUES ('$Titre_rapport', '$Description_rapport', '$Date_depot', '$Chemin_fichier')";

        if (mysqli_query($conn, $sql)) {
            echo "<script type=\"text/javascript\"> alert('Utilisateur ajouté avec succès'); window.location='ajouterRapport.html';</script>";
        } else {
            echo "Erreur lors de l'enregistrement du rapport : " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } 
    else {
     // Redirection vers le formulaire si les données n'ont pas été soumises via POST
     header("ajouterRapport.html");
     exit();
    }


 ?>
