<?php
session_start();


// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "eurekit");

// Vérification de la connexion
if ($mysqli->connect_errno) {
    echo "Erreur de connexion à la base de données : " . $mysqli->connect_error;
    exit;
}

// Validation de la connexion utilisateur
if (!isset ($_SESSION['email'])) {
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

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

        /* Confirmation message */
        .message {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: 150px;
            margin-right: 150px;
        }

        .message h3 {
            font-weight: bold;
            margin-bottom: 10px;
            color: #28a745;
        }



        .container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding-bottom: 50px;
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

        /* Profile section styles */
        .profile {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .profile-icon {
            cursor: pointer;
            border-radius: 50%;
            max-height: 50px;
        }

        .dropdown {
            position: absolute;
            top: 0;
            left: -350%;
            background-color: #fff;
            display: none;
            /* initially hidden */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
        }

        .dropdown-item {
            padding: 5px 10px;
            text-align: left;
            cursor: pointer;

            /* Hover effect for menu items */
            &:hover {
                background-color: #f0f0f0;
            }
        }

        /* Show dropdown menu on hover */
        .profile:hover .dropdown {
            display: block;
        }

        .link {
            font-size: 16px;
            color: #1d3f88;
            text-decoration: none;
            /* Remove underline */
            padding: 10px 20px;
            /* Increase clickable area */
            transition: background-color 0.2s ease-in-out;
            /* Add hover effect */
        }

        .link:hover {
            color: #1d3f88;
        }

        .informations {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            color: #1d3f88;
            width: 550px;
            margin: 0 auto;
        }

        .informations label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: center;
        }

        .informations input,
        .informations textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .informations input:focus,
        .informations textarea:focus {
            border: 1px solid #007bff;
        }

        .informations textarea {
            height: 150px;
        }

        /* Ajout d'effets subtils au hover */
        .informations input:hover,
        .informations textarea:hover,
        .informations button:hover {
            transform: scale(1.01);
        }


        /* Media queries pour différentes résolutions */

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

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
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

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 414x896 */
        @media screen and (min-width: 414px) and (max-width: 896px) {
            .body {
                width: 100%;
            }

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 412x915 */
        @media screen and (min-width: 412px) and (max-width: 915px) {
            .body {
                width: 100%;
            }

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 393x873 */
        @media screen and (min-width: 393px) and (max-width: 873px) {
            .body {
                width: 100%;
            }

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
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

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
            }


            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x640 */
        @media screen and (min-width: 360px) and (max-width: 640px) {
            .body {
                width: 100%;
            }

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
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

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
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

            .message {
                text-align: center;
                padding: 30px;
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                margin: auto;
            }

            .message h3 {
                font-weight: bold;
                margin-bottom: 10px;
                color: #28a745;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }
    </style>

    <nav class="navbar navbar-expand-lg flex-column " id="navbar">
        <a class="navbar-brand" href="index.php" style="color: #fff">
            <img src="img/logo_eurekit.png" alt="Logo EurekiT">EurekiT
        </a>
        <div id="navbarNav">
            <ul class="navbar-nav mt-2">
                <li class="nav-item">
                    <a class="nav-link" href="vehicule.php"">Reservation de Vehicule</a>
                </li>
                <li class=" nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contenu">A propos</a>
                </li>
                <!--Afficher les informations du compte et les reservations faites-->
                <div class="profile">
                    <img src="img/profile-icon.png" alt="Profile Icon" class="profile-icon">
                    <ul class="dropdown">
                        <li class="dropdown-item">
                            <a class="link" href="informations.php">Informations</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link" href="mes_reservations.php">Mes Reservations</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link" href="deconnexion.php">Se deconnecter</a>
                        </li>

                    </ul>
                </div>

            </ul>
        </div>
    </nav>
    <?php
    // Fonction pour récupérer les informations du client
    function get_client_info($mysqli, $client_id)
    {
        $query = "SELECT * FROM client WHERE ClientID = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Récupérer les informations du client
    $client_info = get_client_info($mysqli, $client_id);
    ?>

    <!-- Afficher les informations du client -->
    <<div class="informations">
        <h2>Informations du client :</h2>
        <form>
            <div>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $client_info['nom']; ?>" readonly>
            </div>
            <div>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $client_info['prenom']; ?>" readonly>
            </div>
            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo $client_info['email']; ?>" readonly>
            </div>
            <div>
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" value="<?php echo $client_info['telephone']; ?>"
                    readonly>
            </div>
            <div>
                <label for="matricule">Matricule :</label>
                <input type="text" id="matricule" name="matricule" value="<?php echo $client_info['matricule']; ?>"
                    readonly>
            </div>
            <div>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $client_info['adresse']; ?>" readonly>
            </div>
            <!-- Ajoutez ici d'autres champs de la table client que vous souhaitez afficher -->
        </form>
        </div>




</body>

</html>