<?php
session_start();
require_once "connection.php";
include "mail.php";

if ($_SESSION["score"] <= 1) {
    $_SESSION["mot"] = "Dommage";
} else {
    $_SESSION["mot"] = "Felicitations";
}

switch ($_SESSION["score"]) {
    case 0:
        $_SESSION["commentaire"] = "Recommecer svp !! C'est inaceptable";
        break;
    case 1:
        $_SESSION["commentaire"] = "Avec une note pareille tu vas redoubler";
        break;
    case 2:
        $_SESSION["commentaire"] = "Tu es en dessous de la note eliminatoire";
        break;
    case 3:
        $_SESSION["commentaire"] = "Tu as besoin de faire beaucoup d'efforts";
        break;
    case 4:
        $_SESSION["commentaire"] = "Continue, c'est presque";
        break;
    case 5:
        $_SESSION["commentaire"] = "C'est trop juste";
        break;
    case 6:
        $_SESSION["commentaire"] = "En dessous de la moyenne";
        break;
    case 7:
        $_SESSION["commentaire"] = "Bravo, vous progressez beaucoup";
        break;
    case 8:
        $_SESSION["commentaire"] = "Ne baissez pas les bras";
        break;
    case 9:
        $_SESSION["commentaire"] = "Vous êtes un champion";
        break;
    case 10:
        $_SESSION["commentaire"] = "Vous êtes le roi de l'examen";
        break;
}

if (isset($_SESSION["num"])) {
    $sql = 'INSERT INTO examen VALUES (0, :numEtudiant, :anneeUniv, :note, :commentaire);';

    $query = $conn->prepare($sql);
    $query->execute(
        array(
            ':numEtudiant' => 2024,
            ':anneeUniv' => $_SESSION["num"],
            ':note' => $_SESSION["score"],
            ':commentaire' => $_SESSION["commentaire"]
        )
    );
} else {
    echo "Le numéro est introuvable";
}
?>


<!DOCTYPE html>
<html
        lang="en"
        class="light-style layout-navbar-fixed layout-wide"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../../assets/"
        data-template="front-pages">
<head>
    <meta charset="UTF-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>EJ QUEST</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
            rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body >
<script src="assets/vendor/js/dropdown-hover.js"></script>
<script src="assets/vendor/js/mega-dropdown.js"></script>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <h1 class="my-auto mx-auto" style="color: darkblue; font-weight: bolder">EJ QUEST</h1>

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block"><?= $_SESSION["nomUtilisateur"]?></span>
                                <small class="text-muted">NIVEAU <span><?= $_SESSION["niveau"]?></span></small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>

                <li>
                    <a class="dropdown-item" href="result.php">
                        <i class="ti ti-settings me-2 ti-sm"></i>
                        <span class="align-middle">Mes resultats</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="login.php" target="_blank">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <span class="align-middle">Se deconnecter</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--/ User -->
    </ul>
    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="form-control search-input container-xxl border-0 tt-input" placeholder="Search..." aria-label="Search..." autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Public Sans&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Oxygen, Ubuntu, Cantarell, &quot;Fira Sans&quot;, &quot;Droid Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre><div class="tt-menu navbar-search-suggestion ps" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-pages"></div><div class="tt-dataset tt-dataset-files"></div><div class="tt-dataset tt-dataset-members"></div><div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div></span>
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
    </div>
</nav>


<main id="container" style="margin: 100px auto 0 auto; text-align: center">
    <div class="row">
        <section class="col-12">
            <h1><?= $_SESSION["commentaire"] ?></h1>
            <h1>Votre note est de : <span><?= $_SESSION["score"] ?></span> / <?= $_SESSION["tb"] ?></h1>
            <form method="post">
                <i class="fas fa-redo-alt">&nbsp;&nbsp;&nbsp;<a href="questionnaires.php">Recommencer</a></i><br><br>
            </form>
            <i class="fas fa-list" >&nbsp;&nbsp;&nbsp;<a href="result.php">Voir mes resultats</a></i>
        </section>
    </div>
</main>

<script src="assets/bootstrap/js/script.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

