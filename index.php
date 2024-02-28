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

        /* Reset and basic styles */
        * {

            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #1d3f88;
            color: #fff;
        }

        /* Global elements */
        .container {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding-bottom: 50px;
        }

        .carousel {
            margin-left: 90px;
            margin-right: 90px;
            margin-top: 50px;
            background-color: transparent;
        }


        .overlay-image {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-position: center;
            background-size: cover;
            opacity: 0.5;

        }

        /* Carousel */
        .carousel-item {
            height: 40em;
            background: #000;
            color: white;
            position: relative;
            background-position: center;
            background-size: cover;

        }

        .carousel-inner {
            color: #fff;
            /* Ensure text is visible */
        }



        .carousel-control-prev span,
        .carousel-control-next span {
            color: #fff;
            /* Ensure icons are visible */
        }

        /* Informations sur l'entreprise */
        .info-entreprise {
            width: 100%;
            text-align: justify;

        }


        /* Titre principal */
        .titre {
            font-size: 24px;
            margin-bottom: 40px;
            text-align: center;
            margin-top: 40px;
        }


        .img {
            max-width: 50%;
            float: right;
            margin-left: 40px;
            margin-right: 40px;
            margin-bottom: 40px;
        }

        .p {
            margin-right: 40px;
            margin-left: 40px;
        }

        .info-texte {
            margin-left: 40px;
            font-size: 18px;
            /* Taille en pixels */
            /* Taille relative à l'élément parent */
            /* Mot-clé pour une taille plus grande */
            margin-bottom: 70px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            margin-left: 20px;
            margin-right: 20px;
            color: #1d3f88;

            display: flex;
            max-width: 100%;
        }


        /* Services proposés */
        .services-proposes {
            margin-top: 40px;
        }

        /* Sous-titres */
        .sous-titre {
            font-size: 20px;
            margin-bottom: 70px;
            margin-left: 40px;
            margin-top: 40px;
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

        .btn {
            display: block;
            /* Assure que le bouton occupe toute sa largeur */
            width: 50%;

            /* Définis la hauteur du bouton */
            padding: 10px 20px;
            /* Augmente la zone cliquable du bouton */
            text-align: center;
            /* Centre le texte du bouton */
            border: none;
            /* Supprime la bordure du bouton */
            color: #fff;
            /* Définis la couleur du texte du bouton */
            cursor: pointer;
            /* Change le curseur en pointeur lorsqu'il survole le bouton */
            transition: all 0.3s ease-in-out;
            /* Ajoute une transition au bouton */
            margin-top: 20px;

            /* Effet de survol */
            &:hover {
                background-color: #1A65B6;
                /* Change la couleur de fond du bouton lorsqu'il est survolé */
            }

            /* Effet de focus */
            &:focus {
                outline: none;
                /* Supprime le contour du bouton lorsqu'il est focusé */
                box-shadow: 0 0 0 2px #fff;
                /* Ajoute une ombre au bouton lorsqu'il est focusé */
            }
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

            .img {
                max-width: 50%;
            }

        }

        /* Résolution: 360x800 */
        @media screen and (min-width: 360px) and (max-width: 800px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            /* Button */
            .btn {
                margin-top: 20px;
            }

            /* Hide the login button from view */
            .btn-primary {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }
        }

        /* Résolution: 1366x768 */
        @media screen and (min-width: 1366px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1536x864 */
        @media screen and (min-width: 1536px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 390x844 */
        @media screen and (min-width: 390px) and (max-width: 844px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 414x896 */
        @media screen and (min-width: 414px) and (max-width: 896px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 412x915 */
        @media screen and (min-width: 412px) and (max-width: 915px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 393x873 */
        @media screen and (min-width: 393px) and (max-width: 873px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1280x720 */
        @media screen and (min-width: 1280px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x780 */
        @media screen and (min-width: 360px) and (max-width: 780px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 360x640 */
        @media screen and (min-width: 360px) and (max-width: 640px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1440x900 */
        @media screen and (min-width: 1440px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 375x812 */
        @media screen and (min-width: 375px) and (max-width: 812px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 1600x900 */
        @media screen and (min-width: 1600px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 2560x1440 */
        @media screen and (min-width: 2560px) {
            .body {
                width: 100%;
            }

            .img {
                max-width: 50%;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        /* Résolution: 810x1080 */
        @media screen and (min-width: 810px) and (max-width: 1080px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
            }

            /* Ajoutez ici les styles spécifiques à cette résolution */
        }

        @media screen and (min-width: 260px) and (max-width: 1080px) {
            .body {
                width: 100%;
            }

            .img {
                display: none;
            }

            .carousel {
                width: 100%;
                height: 50%;
                margin-left: 0;
                margin-right: 0;
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



    <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <div class="overlay-image" style="background-image:url(img/slide-1.jpg);"></div>
                <div class="container">
                    <h1>Bienvenue chez EurekiT</h1>
                    <p>Bienvenue sur notre site d'informatique, où l'innovation rencontre la simplicité.
                        Explorez notre univers numérique, découvrez des solutions technologiques avancées
                        et plongez dans une expérience informatique exceptionnelle. Prêt à embarquer dans
                        le futur numérique avec nous ?</p>
                    <button type="button" class="btn btn-lg btn-primary"
                        onclick="window.location.href='inscription.php'">
                        Connexion / Inscription
                    </button>


                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div class="overlay-image" style="background-image:url(img/slide-2.jpg);"></div>
                <div class="container">
                    <h1>Vehicule de fonction</h1>
                    <p>Optimisez la gestion de votre flotte professionnelle avec notre système
                        de réservation de voitures de fonction. Simplifiez le processus,
                        économisez du temps et assurez une mobilité efficace pour votre entreprise.
                        Réservez dès maintenant pour une conduite sans tracas vers le succès
                        professionnel.
                    </p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href='vehicule.php'">
                        Reserver un vehicule
                    </button>

                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div class="overlay-image" style="background-image:url(img/slide-3.jpg);"></div>
                <div class="container">
                    <h1>Vous avez une question ?</h1>
                    <p>Notre équipe est à votre disposition pour répondre à vos questions et vous aider à trouver la
                        solution qui vous convient le mieux.
                        N'hésitez pas à nous contacter, nous sommes là pour vous aider !</p>
                    <button type="button" class="btn btn-lg btn-primary" onclick="window.location.href='contact.php'">
                        Nous contacter
                    </button>

                </div>
            </div>
        </div>
        <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
            <span class="sr-only"></span>
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
            <span class="sr-only"></span>
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
    <section class="contenu" id="contenu">
        <div class="info-entreprise">
            <h1 class="titre">À Propos d'EurekiT</h1>
            <img class="img" src="img/entreprise.jpg">
            <p class="info-texte">EurekiT se distingue en tant qu'entreprise spécialisée dans la fourniture de
                services d'hébergement de solutions informatiques. Notre engagement envers
                l'excellence et l'innovation nous a permis de nous positionner en tant que leader
                dans le domaine de la virtualisation.<br>
                <br>
                EurekiT met à votre disposition un service de réservation de véhicules complet et flexible pour répondre
                aux besoins de vos techniciens intervenant sur site. Notre large flotte de véhicules est conçue pour
                s'adapter à une variété de missions et de budgets.

                Plus qu'un simple système de réservation, EurekiT vous offre une solution de gestion de flotte optimisée
                :<br>
                <br>

                - Un large choix de véhicules : Du simple utilitaire aux véhicules spécialisés, nous disposons d'une
                large
                gamme de véhicules pour répondre à tous vos besoins.<br>
                <br>
                - Un système de réservation intuitif : Réservez votre véhicule en quelques clics via notre plateforme en
                ligne ou notre application mobile.<br>
                <br>
                - Une gestion des déplacements optimisée : Notre système vous permet de suivre vos véhicules en temps
                réel
                et d'optimiser vos itinéraires.<br>
                <br>
                - Un service client dédié : Notre équipe est à votre disposition pour vous accompagner dans le choix de
                votre véhicule et répondre à vos questions.<br>
                <br>
                En choisissant EurekiT, vous bénéficiez de :<br>
                <br>

                - Une grande réactivité : Nous nous engageons à vous fournir un véhicule dans les meilleurs délais.<br>
                <br>
                - Une planification efficace : Optimisez vos interventions en réservant votre véhicule à l'avance.<br>
                <br>
                - Une tranquillité d'esprit : Bénéficiez d'une assurance et d'un entretien complets pour tous nos
                véhicules.<br>
                <br>
                EurekiT, c'est la garantie d'un service de qualité pour une meilleure mobilité de vos techniciens.<br>
                <br>La base de données de l'entreprise constitue le socle technologique permettant la gestion fluide des
                réservations de véhicules, l'affectation des techniciens, ainsi que la disponibilité des salles de
                réunion. Cela garantit une expérience client exceptionnelle, renforcée par la transparence des
                informations et la rapidité d'exécution des services. Avec son engagement <br>
                envers l'innovation et la qualité de service, EurekiT se positionne comme un partenaire de confiance
                <br>
                pour répondre aux besoins évolutifs de ses clients.
            </p>
    </section>



    <h1 class="titre">
        Services Proposés
    </h1>
    <h2 class="sous-titre">
        Hébergement de Solutions
    </h2>
    <img class="img" src="img/virtualisation.jpg">
    <p class="info-texte">
        EurekiT : Des solutions d'hébergement sur mesure pour votre entreprise<br>
        <br>
        EurekiT vous accompagne dans la mise en place de solutions d'hébergement complètes et évolutives, adaptées aux
        besoins spécifiques de votre entreprise. Notre expertise s'étend de l'installation de baies de brassage à la
        configuration de serveurs et de postes de travail, en passant par la virtualisation et le cloud computing.<br>
        <br>

        Notre offre d'hébergement comprend :<br>
        <br>

        • Installation de baies de brassage : Nous concevons et installons des baies de brassage répondant aux normes de
        sécurité et de performance les plus élevées.<br>
        <br>

        • Hébergement de serveurs : Nous hébergeons vos serveurs dans nos datacenters sécurisés et redondants,
        garantissant une disponibilité et une performance optimales.<br>
        <br>

        • Virtualisation : Nous virtualisons vos infrastructures informatiques, vous permettant de réduire vos coûts et
        d'améliorer votre agilité.<br>
        <br>

        • Cloud computing : Nous vous offrons des solutions de cloud computing flexibles et évolutives, vous permettant
        de profiter des dernières technologies sans investissement initial important.<br>
        <br>

        • Solutions de sauvegarde et de sécurité : Nous protégeons vos données critiques contre les ransomwares et les
        cyberattaques grâce à des solutions de sauvegarde et de sécurité de pointe.<br>
        <br>

        • Support technique expert : Notre équipe d'experts est à votre disposition pour vous accompagner dans le choix
        de la solution d'hébergement la plus adaptée à vos besoins et pour vous garantir un support technique réactif et
        efficace.<br>
        <br>
    </p>
    </div>
    <h2 class="sous-titre">
        Localisation
    </h2>
    <p class="info-texte">
        Adresse : 7 Avenue Jean Jaurès<br>
        <br>

        Ville : Combs-la-Ville<br>
        <br>

        Mail : contact.eurekit@eurekit.com<br>
        <br>

        Téléphone : 06.14.43.07.33<br>
        <br>
    </p>






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

<button type="button" class="btn btn-lg btn-primary" id="deconnexion" onclick="window.location.href='deconnexion.php'">
    Se déconnecter
</button>


</html>