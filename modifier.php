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

    <div class="barre2" >
        <div><style> </style>
            <h1> welcome au Page  de modifications: </h1>
     </div>
     <br>
     <br>
     <div class="detaille">
     <?php

        if($_POST['modifier']!='Enregistrer'){
            // Informations de connexion à la base de données
            include_once 'connectionPage.php';

            $ID_rapport=mysqli_real_escape_string($conn, $_POST['ID_rapport']);
            $requete="SELECT * FROM rapport_stage WHERE ID_rapport='$ID_rapport'";
            $result=mysqli_query($conn, $requete);
            $coord=mysqli_fetch_row($result);

            //Création du formulaire
            
            echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">";
            echo "<fieldset>"; 
            echo "<legend><b>Modifiez rapport</b></legend>";
            echo "<table>";
            echo "<tr>
                    <td>Titre_rapport:</td>
                    <td><input type=\"text\" name=\"Titre_rapport\" value=\"$coord[1]\"/> </td>
                    </tr>"; 
            echo "<tr>
                    <td>Description_rapport </td>
                    <td><input type=\"text\" name=\"Description_rapport\" value=\"$coord[2]\"/></td>
                    </tr>"; 
            echo "<tr>
                    <td> Date_depot</td>
                    <td><input type=\"date\" name=\"Date_depot\" value=\"$coord[3]\"/></td>
                    </tr>"; 
            echo "<tr>
                    <td>Chemin_fichier </td>
                    <td><input type=\"text\" name=\"Chemin_fichier\" value=\"$coord[4]\"/></td>
                    </tr>"; 
        
            echo "<tr>
                <td><input type=\"reset\" value=\" Effacer\"></td>
                <td><input type=\"submit\" name=\"modifier\"value=\"Enregistrer\"></td>
                </tr>
            </table>";
            echo "</fieldset>";
            echo "<input type=\"hidden\" name=\"ID_rapport\" value=\"$ID_rapport\"/>"; 
            echo "</form>";
            }
            elseif(isset($_POST['Titre_rapport']) && isset($_POST['Description_rapport']) && isset($_POST['Date_depot']) && 
            isset($_POST['Chemin_fichier']) )
            {
            //ENREGISTREMENT
            include_once 'connectionPage.php';


                $ID_rapport          = mysqli_real_escape_string($conn, $_POST['ID_rapport']);
                $Titre_rapport       = mysqli_real_escape_string($conn, $_POST['Titre_rapport']);
                $Description_rapport = mysqli_real_escape_string($conn, $_POST['Description_rapport']);
                $Date_depot          = mysqli_real_escape_string($conn, $_POST['Date_depot']);
                $Chemin_fichier      = mysqli_real_escape_string($conn, $_POST['Chemin_fichier']);

                $sql_up = "UPDATE rapport_stage SET Titre_rapport='$Titre_rapport', 
                Description_rapport='$Description_rapport', Date_depot='$Date_depot', Chemin_fichier='$Chemin_fichier' WHERE ID_rapport='$ID_rapport'";


                $result = mysqli_query($conn, $sql_up);

                if ($result) {
                    echo "<script type=\"text/javascript\"> alert('Vos modifications sont enregistrées'); 
                    window.location='Afficher.php';</script>";
                } 
                else {
                echo "<script type=\"text/javascript\"> alert('Erreur : les informations non modifier')</script>";}
                }
                else { echo "Modifier vos coordonnées!"; 
                }
 ?>

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
    
    <div class="copyright">
        <p>© 2017 ENSA AGADIR 2024 Mon Site Web - Tous droits réservés</p>
    </div>
</footer>

</body>
</html>








































<?php

if($_POST['modifier']!='Enregistrer'){
    // Informations de connexion à la base de données
    include_once 'connectionPage.php';

    $ID_rapport=mysqli_real_escape_string($conn, $_POST['ID_rapport']);
    $requete="SELECT * FROM rapport_stage WHERE ID_rapport='$ID_rapport'";
    $result=mysqli_query($conn, $requete);
    $coord=mysqli_fetch_row($result);

    //Création du formulaire
    
    echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">";
    echo "<fieldset>"; 
    echo "<legend><b>Modifiez rapport</b></legend>";
    echo "<table>";
    echo "<tr>
              <td>Titre_rapport:</td>
              <td><input type=\"text\" name=\"Titre_rapport\" value=\"$coord[1]\"/> </td>
            </tr>"; 
    echo "<tr>
              <td>Description_rapport </td>
              <td><input type=\"text\" name=\"Description_rapport\" value=\"$coord[2]\"/></td>
            </tr>"; 
    echo "<tr>
              <td> Date_depot</td>
              <td><input type=\"date\" name=\"Date_depot\" value=\"$coord[3]\"/></td>
            </tr>"; 
    echo "<tr>
              <td>Chemin_fichier </td>
              <td><input type=\"text\" name=\"Chemin_fichier\" value=\"$coord[4]\"/></td>
            </tr>"; 
   
    echo "<tr>
           <td><input type=\"reset\" value=\" Effacer\"></td>
           <td><input type=\"submit\" name=\"modifier\"value=\"Enregistrer\"></td>
        </tr>
    </table>";
     echo "</fieldset>";
     echo "<input type=\"hidden\" name=\"ID_rapport\" value=\"$ID_rapport\"/>"; 
     echo "</form>";
    }
    elseif(isset($_POST['Titre_rapport']) && isset($_POST['Description_rapport']) && isset($_POST['Date_depot']) && 
    isset($_POST['Chemin_fichier']) )
    {
    //ENREGISTREMENT
    include_once 'connectionPage.php';


        $ID_rapport          = mysqli_real_escape_string($conn, $_POST['ID_rapport']);
        $Titre_rapport       = mysqli_real_escape_string($conn, $_POST['Titre_rapport']);
        $Description_rapport = mysqli_real_escape_string($conn, $_POST['Description_rapport']);
        $Date_depot          = mysqli_real_escape_string($conn, $_POST['Date_depot']);
        $Chemin_fichier      = mysqli_real_escape_string($conn, $_POST['Chemin_fichier']);

         $sql_up = "UPDATE rapport_stage SET Titre_rapport='$Titre_rapport', 
         Description_rapport='$Description_rapport', Date_depot='$Date_depot', Chemin_fichier='$Chemin_fichier' WHERE ID_rapport='$ID_rapport'";


        $result = mysqli_query($conn, $sql_up);

        if ($result) {
            echo "<script type=\"text/javascript\"> alert('Vos modifications sont enregistrées'); 
            window.location='Afficher.php';</script>";
        } 
        else {
           echo "<script type=\"text/javascript\"> alert('Erreur : les informations non modifier')</script>";}
        }
        else { echo "Modifier vos coordonnées!"; }




    



 ?>
