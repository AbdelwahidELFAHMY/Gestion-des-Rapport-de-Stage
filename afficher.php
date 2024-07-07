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

        <div class="barre2">
            <div>
                <pre> welcome au Page  d'affiche ::  
            </pre>

                <form action="afficher.php" method="post">
                    <button type="submit" name="Afficher">Afficher</button>
                </form>
            </div>
            <br><br>
            <div>
                <?php
    include_once 'connectionPage.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Afficher"])) {
        $sql = "SELECT * FROM rapport_stage";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Erreur lors de la récupération des rapports : " . mysqli_error($conn);
        } else {
            // Afficher la liste des rapports de stage
            echo "<h2 style='text-align: center;'>Liste des rapports de stage :</h2> <br>";
            echo "<table style='border-collapse: collapse; width: 100%;'>";
            echo "<tr><th style='border: 1px solid black; padding: 8px; text-align: left;'>Titre</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>Description</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>Date de dépôt</th><th style='border: 1px solid black; padding: 8px; text-align: left;'>boutton</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['Titre_rapport'] . "</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['Description_rapport'] . "</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>" . $row['Date_depot'] . "</td>";
                echo "<td style='border: 1px solid black; padding: 8px;'>";

                echo "<form action=\"modifier.php\" method=\"post\">";
                echo "<input type='hidden' name='ID_rapport' value='".$row['ID_rapport']."'> ";
                echo " <input type='submit' id='button' name='modifier' value='modifier'>";
                echo "</form>";

                echo "<form action=\"detaille.php\" method=\"post\">";
                echo "<input type='hidden' name='ID_rapport' value='".$row['ID_rapport']."'> ";
                echo"  <input type=\"submit\" name=\"detaille\"value=\"detaille\"> </td>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                }
                echo "</table>";
        }
    }
    ?>
            </div>

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