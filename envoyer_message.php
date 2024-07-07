<?php
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $destinataire = 'anaslahbou11@gmail.com';

    
    $sujet = 'Nouveau message de contact depuis votre site web';


    $contenu = "Nom : $nom\n";
    $contenu .= "Email : $email\n\n";
    $contenu .= "Message :\n$message";

   
    $headers = 'From: ' . $email . "\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";

 
    if (mail($destinataire, $sujet, $contenu, $headers)) {
        echo 'Votre message a été envoyé avec succès.';
    } else {
        echo 'Une erreur s\'est produite lors de l\'envoi du message.';
    }
}
?>
