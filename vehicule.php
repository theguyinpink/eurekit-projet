<?php
session_start();
error_reporting(0);

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "eurekit");

// Vérification de la connexion
if ($mysqli->connect_errno) {
    echo "Erreur de connexion à la base de données : " . $mysqli->connect_error;
    exit;
}

// Validation de la connexion utilisateur
if (!isset($_SESSION['email'])) {
    // Redirection vers la page de connexion
    header('Location: connexion.php');
    exit;
}

// Récupération du ClientID via une fonction
$client_id = get_client_id($mysqli, $_SESSION['email']);

// Fonction pour récupérer le ClientID
function get_client_id($mysqli, $email)
{
    $query = "SELECT ClientID FROM client WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $client_data = $result->fetch_assoc();
    return $client_data['ClientID'];
}

// Récupération des réservations existantes pour les dates spécifiées
$reservations = array();
if (isset($_POST['submit'])) {
    $date_debut = date('Y-m-d', strtotime($_POST['date_debut']));
    $date_fin = date('Y-m-d', strtotime($_POST['date_fin']));

    // Requête SQL pour récupérer les réservations pour les dates spécifiées
    $query_reservations = "SELECT vehiculeID FROM reservation WHERE date_fin >= '$date_debut' AND date_debut <= '$date_fin'";
    $result_reservations = $mysqli->query($query_reservations);
    while ($row = $result_reservations->fetch_assoc()) {
        $reservations[] = $row['vehiculeID'];
    }
}

// Requête pour récupérer les véhicules disponibles
$query_vehicules = "SELECT vehiculeID, plaque_immatriculation, marque, modele FROM vehicule";
if (!empty($reservations)) {
    // Si des réservations existent, on exclut ces véhicules de la requête
    $query_vehicules .= " WHERE vehiculeID NOT IN (SELECT vehiculeID FROM reservation WHERE date_fin >= '$date_debut' AND date_debut <= '$date_fin')";
}
$result_vehicules = $mysqli->query($query_vehicules);

// Définition des variables pour l'affichage des erreurs
if (isset($_GET["erreur"]) && $_GET["erreur"] == 1) {
    $errorMessage = urldecode($_GET["errormessage"]);
    $client_id_session = $_SESSION['ClientID'];
    $client_id_db = get_client_id($mysqli, $_SESSION['email']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de véhicule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;

        }

        body {
            background-color: #1d3f88;
            color: #fff;
            /* Adjust text color for contrast */
        }

        .container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding-bottom: 50px;
        }

        /* Exclude the form from the background color */
        .form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
            color: #1d3f88;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: center;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        input:focus,
        textarea:focus {
            border: 1px solid #007bff;
        }

        textarea {
            height: 150px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0069d9;
        }

        /* Ajout d'effets subtils au hover */
        input:hover,
        textarea:hover,
        button:hover {
            transform: scale(1.01);
        }

        .navbar-brand img {
            max-height: 50px;
            margin-right: 10px;
            /* Space between logo and text */
        }

        /* Navbar styles */
        .navbar {
            background-color: #1d3f88;
            /* Couleur de fond modifiée */
            color: #fff;
            /* Couleur de texte ajustée pour le contraste */
            /* Light background color */
            padding: 20px;
            /* Add padding for margins */
            display: flex;
            /* Allow horizontal layout */
        }

        .navbar-brand {
            position: relative;
        }

        .nav-item {
            margin-bottom: 15px;
            /* Space between menu items */
        }

        .nav-link {
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            /* Remove underline */
            padding: 10px 20px;
            /* Increase clickable area */
            transition: background-color 0.2s ease-in-out;
            /* Add hover effect */
        }

        .nav-link:hover {
            color: grey;
            /* Change background color on hover */
        }

        .navbar-brand .text-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 20px;
        }


        /* Résolution: 1920x1080 */
        @media screen and (min-width: 1920px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }
        }

        /* Résolution: 360x800 */
        @media screen and (min-width: 360px) and (max-width: 800px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }

        }

        /* Résolution: 1366x768 */
        @media screen and (min-width: 1366px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1536x864 */
        @media screen and (min-width: 1536px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 390x844 */
        @media screen and (min-width: 390px) and (max-width: 844px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 414x896 */
        @media screen and (min-width: 414px) and (max-width: 896px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 412x915 */
        @media screen and (min-width: 412px) and (max-width: 915px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }



            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 393x873 */
        @media screen and (min-width: 393px) and (max-width: 873px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1280x720 */
        @media screen and (min-width: 1280px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x780 */
        @media screen and (min-width: 360px) and (max-width: 780px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x640 */
        @media screen and (min-width: 360px) and (max-width: 640px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1440x900 */
        @media screen and (min-width: 1440px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 375x812 */
        @media screen and (min-width: 375px) and (max-width: 812px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1600x900 */
        @media screen and (min-width: 1600px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 2560x1440 */
        @media screen and (min-width: 2560px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 810x1080 */
        @media screen and (min-width: 810px) and (max-width: 1080px) {
            .body {
                width: 100%;
            }

            .form {
                width: 80%;
                margin: 0 auto;
                text-align: center;
                justify-content: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin-top: 50px;

            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }
    </style>

    <nav class="navbar navbar-expand-lg flex-column " id="navbar">
        <a class="navbar-brand" style="color: #fff">
            <img src="img/logo_eurekit.png" alt="Logo EurekiT">EurekiT
        </a>
        <div id="navbarNav">
            <ul class="navbar-nav mt-2">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"">Accueil</a>
                </li>
                <li class=" nav-item">
                        <a class="nav-link" href="vehicule.php"">Reservation de Vehicule</a>
                </li>
                <li class=" nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contenu">A propos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="form">

        <form action="vehicule.php" method="post">
            <label for="date_debut">Date de début:</label>
            <input type="date" name="date_debut" style="text-align: center;">

            <label for="date_fin">Date de fin:</label>
            <input type="date" name="date_fin" style="text-align: center;">

            <button type="submit" name="submit" id="button">Veuillez sélectionner les dates en premier</button>


        </form>
    </div>

    <?php if ($result_vehicules->num_rows > 0): ?>
        <h3 style='margin-left: 50px; margin-top: 50px; text-align:center' ;>Véhicules disponibles pour les dates spécifiées
            :</h3>
        <ul>
            <?php while ($vehicule = $result_vehicules->fetch_assoc()): ?>
                <li>
                    <div class="form">
                        <form action="reservation.php" method="post">
                            <input type="hidden" name="vehicule_id" value="<?= $vehicule['vehiculeID'] ?>">
                            <input type="hidden" name="date_debut" value="<?= $_POST['date_debut'] ?>">
                            <input type="hidden" name="date_fin" value="<?= $_POST['date_fin'] ?>">
                            <?= $vehicule['marque'] . ' ' . $vehicule['modele'] . ' (' . $vehicule['plaque_immatriculation'] . ')' ?><br>
                            <button type="submit" name="submit" id="button">Réserver</button>
                        </form>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>Aucun véhicule disponible pour les dates spécifiées.</p>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>