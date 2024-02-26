<?php
// Récupération des données du formulaire
$nom = htmlspecialchars($_POST['nom']??'');
$prenom = htmlspecialchars($_POST['prenom']??'');
$email = htmlspecialchars($_POST['email']??'');
$password = sha1($_POST['password']);
$telephone = htmlspecialchars($_POST['telephone']??'');
$matricule = htmlspecialchars($_POST['matricule']??'');
$adresse = htmlspecialchars($_POST['adresse']??'');


// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "eurekit";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Vérification si l'email existe déjà
$query = "SELECT * FROM client WHERE email='$email'";
$result = $connexion->query($query);
if ($result->num_rows > 0) {
    // L'email existe déjà, affichez un message d'erreur approprié à l'utilisateur
    echo "L'adresse e-mail est déjà associée à un compte.";
} else {
    // L'email n'existe pas encore, insérez les données dans la base de données
    $requete = "INSERT INTO client (nom, prenom, email, password, telephone, matricule, adresse) VALUES ('$nom', '$prenom', '$email', '$password', '$telephone', '$matricule', '$adresse')";
    if ($connexion->query($requete) === TRUE) {
        echo "Inscription réussie.";
    } else {
        echo "Erreur lors de l'inscription : " . $connexion->error;
    }
}

// Fermer la connexion
$connexion->close();
?>
