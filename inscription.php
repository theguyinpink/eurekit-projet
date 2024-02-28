<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>EurekiT</title>
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
            margin-left: 150px;
            margin-right: 150px;
            color: #1d3f88;
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

            .img-eurekit img {
                max-width: 60%;
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

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 414x896 */
        @media screen and (min-width: 414px) and (max-width: 896px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 412x915 */
        @media screen and (min-width: 412px) and (max-width: 915px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 393x873 */
        @media screen and (min-width: 393px) and (max-width: 873px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
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

            .img-eurekit img {
                max-width: 60%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x640 */
        @media screen and (min-width: 360px) and (max-width: 640px) {
            .body {
                width: 100%;
            }

            .img-eurekit img {
                max-width: 60%;
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

            .img-eurekit img {
                max-width: 60%;
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

            .img-eurekit img {
                max-width: 60%;
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


    <div class="form">

        <form action="traitement_inscription.php" method="post">
            <h1 style="text-align: center;">Inscription</h1>
            <label for="nom" style="margin-top: 20px;">Nom:</label><br>
            <input type="text" id="nom" name="nom" autocomplete="off" required><br>

            <label for="prenom">Prénom:</label><br>
            <input type="text" id="prenom" name="prenom" autocomplete="off" required><br>

            <label for="matricule">Matricule:</label><br>
            <input type="text" id="matricule" name="matricule" autocomplete="off" required><br>

            <label for="adresse">Adresse:</label><br>
            <input type="text" id="adresse" name="adresse" autocomplete="off" required><br>

            <label for="telephone">Numéro de téléphone:</label><br>
            <input type="tel" id="telephone" name="telephone" autocomplete="off" required><br>

            <label for="email">Adresse mail:</label><br>
            <input type="email" id="email" name="email" autocomplete="off" required><br>

            <label for="mot_de_passe">Mot de passe:</label><br>
            <input type="password" id="password" name="password" autocomplete="off" required><br>

            <label for="verification_mot_de_passe">Vérification du mot de passe:</label><br>
            <input type="password" id="verification_mot_de_passe" name="verification_mot_de_passe" autocomplete="off"
                required><br>

            <button type="submit" id="submit">S'inscrire</button>
            <p>Vous avez déjà un compte ? <a href="connexion.php">Cliquez ici pour vous connecter</a>.</p>
        </form>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>