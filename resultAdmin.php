<?php
session_start();
require_once 'connection.php';
//$tri = "note";
//
//if (isset($_POST["trie"])){
//    $tri = $_POST["trie"];
//
//    $sql = 'SELECT * FROM examen order by note DESC';
//    $sql = 'SELECT * FROM examen order by '.$tri.' ASC ';
//    $query = $conn->prepare($sql);
//    $query->execute();
//    $result = $query->fetchAll(PDO::FETCH_ASSOC);
//}

// Requete sql dans une variable
$sql = 'SELECT * FROM examen order by note DESC';

// preparation du resultat
$query = $conn->prepare($sql);

// Execution de la requette
$query->execute();

// Stockage du resultat dans une variable

$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../../assets/"
    data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>EJ QUEST</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

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
</head>


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
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block">Administrateur</span>
                                <small class="text-muted">NIVEAU <span>Admin</span></small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>

                <li>
                    <a class="dropdown-item" href="questionAdmin.php" target="_blank">
                        <i class="ti ti-question-mark me-2 ti-sm"></i>
                        <span class="align-middle">Questionnaires</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="admin.php" target="_blank">
                        <i class="ti ti-mood-happy me-2 ti-sm"></i>
                        <span class="align-middle">Etudiant</span>
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

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

<!--        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">-->
<!--            <div class="app-brand demo">-->
<!--                <a href="index.html" class="app-brand-link">-->
<!--                    <span class="app-brand-text demo menu-text fw-bold">ADMINISTRATEUR</span>-->
<!--                </a>-->
<!--            </div>-->
<!--            <br>-->
<!---->
<!--            <li class="menu-item active">-->
<!--                <a href="admin.php" class="menu-link">-->
<!--                    <i class="menu-icon tf-icons ti ti-pencil"></i>-->
<!--                    <div data-i18n="Email">Etudiant</div>-->
<!--                </a>-->
<!--            </li>-->
<!--            <br>-->
<!---->
<!--            <li class="menu-item active">-->
<!--                <a href="resultAdmin.php" class="menu-link">-->
<!--                    <i class="menu-icon tf-icons ti ti-check"></i>-->
<!--                    <div data-i18n="Email">Resulats</div>-->
<!--                </a>-->
<!--            </li>-->
<!--        </aside>-->

        <div class="layout-content " style="margin: 100px auto 0 auto" >

            <main class="container">
                <div class="row">
                    <section class="col-12">

                        <h1>LISTE DE MES RESULTAT</h1>
<!--                        <form method="post" action="">-->
<!--                            <select name="trie" id="trie">-->
<!--                                <option value="numExam">N° Exam</option>-->
<!--                                <option value="numEtudiant">N° Etudiant</option>-->
<!--                                <option value="note">Note</option>-->
<!--                            </select>-->
<!--                            <button type="submit" class="btn btn-primary">-->
<!--                                Trier-->
<!--                            </button>-->
<!--                        </form>-->
                        <table class="table">
                            <thead>
                            <th>N°Examen</th>
                            <th>Numero Etudiant</th>
                            <th>NOTE</th>
                            <th>Rang</th>
                            </thead>
                            <tbody>
                            <?php
                            // On fait une iteration sur la variable result
                            foreach ($result as $key=>$etudiant){
                                ?>
                                <tr STYLE="text-align: center">
                                    <td>0<?=$etudiant["numExam"] ?></td>
                                    <td><?=$etudiant["numEtudiant"]?></td>
                                    <td><?=$etudiant["note"]?>/10</td>
                                    <td><?=$key+1?></td>
                                </tr>

                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </section>

                </div>


            </main>

        </div>
    </div>

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/vendor/libs/swiper/swiper.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
</body>
</html>
