<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Page</title>
    <link rel="stylesheet" href="style_Login_Regester.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<body>
    <div class="wrapper">
        <form class="register-form" action="Regester.php" method="post">
            <h1> Sign In</h1>
            <div class="input-box">
                <input type="text" name="Prenom" placeholder="Prenom" />
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="Nom" placeholder="Nom" />
                <i class='bx bx-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="Email" placeholder="Email" />
                <i class='bx bx-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="Mot_passe" placeholder="Password" />
                <i class='bx bx-lock-alt'></i>
            </div>
            <div class="input-box">
                <select id="filiere" name="filiere" required>
                    <option value="">Sélectionner une filière</option>
                    <?php
    
                    include_once("ConnectionBD.php");
    
                    $sqlFiliere = "SELECT ID_filière, Nom_filière FROM filière WHERE ID_filière NOT IN 
                    (SELECT ID_filière FROM secretaire_departement );";
                    $resultFiliere = $conn->query($sqlFiliere);
        
                    
                    if ($resultFiliere->num_rows > 0) {
                        while ($rowFiliere = $resultFiliere->fetch_assoc()) {
                            echo '<option value="' . $rowFiliere["ID_filière"] . '">' . $rowFiliere["Nom_filière"] . '</option>';
                        }
                    } else {
                        echo '<option value="" disabled>Aucune filière est disponible actuellement.</option>';
                    }
                    ?>
                </select>
            </div>
            <?php
            // Si aucune filière n'est disponible, désactiver le bouton d'inscription
            if ($resultFiliere->num_rows == 0) {
                echo '<button class="btn" type="submit" disabled>S\'inscrire</button>';
                echo '<p class="msg">Impossible de s\'inscrire car aucune filière n\'est disponible.</p>';
            } else {
                echo '<button class="btn" type="submit">S\'inscrire</button>';
            }
            ?>
        <div class="register-link">
            <p>If you  have  account <a href="Page_Login.html">Log In </a></p>
        </div>
    </form>
     
    </div>
</body>
</html>
