<?php

// Démarrage de la session
session_start();

// Connexion à la base de données
$con = new mysqli("localhost", "root", "", "eurekit");

// Vérification de la connexion utilisateur
if (!isset($_SESSION['email'])) {
  // Redirection vers la page de connexion
  header('Location: connexion.php');
  exit;
}

// Traitement de la soumission du formulaire
if (isset($_POST['submit'])) {

  $vehicule_id = $_POST['vehicule_id'];
  $client_id = $_SESSION['ClientID'];
  $date_debut = date('Y-m-d', strtotime($_POST['date_debut']));
  $date_fin = date('Y-m-d', strtotime($_POST['date_fin']));

  // Requête SQL pour insérer la réservation
  $query = "INSERT INTO reservation (clientID, vehiculeID, date_debut, date_fin) VALUES ('$client_id', '$vehicule_id', '$date_debut', '$date_fin')";
  $query_run = mysqli_query($con, $query);

  if ($query_run) {
    echo "Reservation effectué";
    header("Location: confirmation_reservation.php");
  } else {
    $errorMessage = mysqli_error($con);
        // Redirection vers vehicule.php avec le paramètre d'erreur et le message
    header("Location: vehicule.php?erreur=1&errormessage=" . urlencode($errorMessage));
    exit;
  }
}

?>