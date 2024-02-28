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
                            <a class="link" href="mes-reservations.php">Mes Reservations</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link" href="deconnexion.php">Se deconnecter</a>
                        </li>

                    </ul>
                </div>

            </ul>
        </div>
    </nav>


    <div class="message">
        <h3>
            Votre réservation a été effectuée <br>
            Merci à vous
        </h3>


    </div>



</body>

</html>