<?php

// Démarrage de la session
session_start();

// Connexion à la base de données
$con = new mysqli("localhost", "root", "", "eurekit");

if (isset($_POST['submit'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $message = $_POST['message'];



  $query = "INSERT INTO contact (nom, prenom, email, message) VALUES ('$nom', '$prenom', '$email', \"$message\")";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    echo "Votre message a bien été envoyé";
    header("Location: message_confirmation.php");
  }
  else
  {
    if ($messageEnvoye) {
        // Message envoyé avec succès
        echo "Votre message a été envoyé avec succès !";
      } else {
        // Erreur lors de l'envoi du message
        echo "**Erreur : Votre message n'a pas pu être envoyé.**";
        header("Location: contact.php?erreur=1"); // Redirection vers contact.php avec le paramètre d'erreur
        exit;
      }
      
      
  }
  
}
?>