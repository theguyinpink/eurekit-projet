<?php
session_start();

// Connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=eurekit', 'root', '');

// Déclaration des variables
$email = $_POST['email'] ?? '';
$mot_de_passe = sha1($_POST['mot_de_passe']);

// Vérification de l'existence du compte
$sql = "SELECT * FROM client WHERE email = '$email' AND password = '$mot_de_passe'";
$resultats = $bdd->query($sql);

// Si le compte existe
if ($resultats->rowCount() === 1) {
  // Récupération des informations de l'utilisateur
  $donnees = $resultats->fetch(PDO::FETCH_OBJ);

  // **Initialisation de la variable ClientID**
  $ClientID = $donnees->ClientID;

  // Stockage des données dans la session
  $_SESSION['email'] = $donnees->email;
  $_SESSION['ClientID'] = $ClientID;

  // Redirection vers la page d'accueil
  header("Location: index.php");
} else {
  // Affichage d'un message d'erreur
  echo "**Erreur :** Les informations de connexion sont incorrectes.";
}

?>
