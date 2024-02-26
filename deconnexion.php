<?php

// Démarrer la session
session_start();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil
header('Location: index.php');

?>