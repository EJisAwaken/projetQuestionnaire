<?php
session_start();

require_once 'connection.php';
    $sql = 'SELECT * FROM etudiant WHERE courrierEtudiant <> :courrierEtudiant ORDER BY niveauEtudiant ASC';

// preparation du resultat
    $query = $conn->prepare($sql);

// Execution de la requette
    $query->execute(
            array(
                    ":courrierEtudiant"=>"admin@gmail.com"
            )
    );

// Stockage du resultat dans une variable

    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    //  Requette pour la recherche:
if (isset($_POST["recherche"])){
    // Requete sql dans une variable
$sql = 'SELECT * FROM etudiant WHERE courrierEtudiant <> :courrierEtudiant AND (nomEtudiant LIKE :recherche OR numEtudiant LIKE :recherche) ORDER BY niveauEtudiant ASC';
$query = $conn->prepare($sql);

$recherche = $_POST['recherche'] . '%';
$query->execute(
    array(
        ":courrierEtudiant"=>"admin@gmail.com",
        ":recherche"=>$recherche
    )
);

$result = $query->fetchAll(PDO::FETCH_ASSOC);
if (count($result) == 0 && !empty($_POST['recherche'])){
    $_SESSION["introuvable"] = "Etudiant n'est pas incrit";
}
}
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
                    <img src="assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="admin.php">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-medium d-block">ADMINISTRATEUR</span>
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
                        <span class="align-middle">Questionnaire</span>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="resultAdmin.php" target="_blank">
                        <i class="ti ti-radar me-2 ti-sm"></i>
                        <span class="align-middle">Resultat</span>
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
                        <h1>LISTE DES ETUDIANTS</h1>

                        <?php
                        require_once 'connection.php';
                        $sqlCount = "SELECT  niveauEtudiant, COUNT(*) AS effectif FROM etudiant GROUP BY niveauEtudiant ORDER BY niveauEtudiant ASC";
                        $reqCount = $conn->query($sqlCount);
                        $rs = $reqCount->fetchAll(PDO::FETCH_ASSOC);
                        $res = 0;
                        for ($i = 0; $i < count($rs); $i++) {
                            $res = $rs[$i]['effectif'] + $res;
                        }
                        ?>

                        <div class="card h-10"><br>
                            <div class="card-body pt-2">
                                <div class="row gy-3" style="margin: 0 auto; text-align: center">

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-user-circle ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$rs[0]['effectif']?></h5>
                                                <small><?=$rs[0]['niveauEtudiant']?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-user-circle ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$rs[1]['effectif']?></h5>
                                                <small><?=$rs[1]['niveauEtudiant']?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-user-circle ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$rs[2]['effectif']?></h5>
                                                <small><?=$rs[2]['niveauEtudiant']?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-user-circle ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$rs[3]['effectif']?></h5>
                                                <small><?=$rs[3]['niveauEtudiant']?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-user-circle ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$rs[4]['effectif']?></h5>
                                                <small><?=$rs[4]['niveauEtudiant']?></small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-3">
                                        <div class="d-flex align-items-center">
                                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                                                <i class="ti ti-users-group ti-sm" STYLE="color: rebeccapurple"></i>
                                            </div>
                                            <div class="card-info">
                                                <h5 class="mb-0"><?=$res?></h5>
                                                <small>Total</small>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <form class="form " style="display: flex; gap: 10px" method="post" action="">
                            <input type="search"
                                   name="recherche"
                                   id="recherche"
                                   class="form-control" placeholder="Entrer nom ou numero de l'etudiant" aria-controls="DataTables_Table_0" style="width: 400px;">
                            <span></span>
                            <button class="btn btn-primary" type="submit">Rechercher</button>
                        </form>
                        <table class="table">
                            <thead>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Niveau</th>
                            <th>Courrier</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            <tr><?php
                                    if (isset($_SESSION["introuvable"] )){
                                        echo "<td colspan='6' style='text-align: center; font-size: 20px; color: red'>". $_SESSION["introuvable"]. "</td>";
                                        unset($_SESSION["introuvable"]);
                                    }
                                ?></tr>
                            <?php
                            // On fait une iteration sur la variable result
                            foreach ($result as $etudiant){
                                ?>
                                <tr>
                                    <td><?=$etudiant["numEtudiant"] ?></td>
                                    <td><?=$etudiant["nomEtudiant"] ?></td>
                                    <td><?=$etudiant["prenomEtudiant"] ?></td>
                                    <td><?=$etudiant["niveauEtudiant"] ?></td>
                                    <td><?=$etudiant["courrierEtudiant"] ?></td>
                                    <td>
                                        <a href="editer.php?numEtudiant=<?= $etudiant['numEtudiant'] ?>">
                                            <i class="menu-icon tf-icons ti ti-pencil"></i>
                                        </a>
                                        <a href="delete.php?numEtudiant=<?= $etudiant['numEtudiant'] ?>" onclick="confirmer()">
                                            <i class="menu-icon tf-icons ti ti-trash" style="color: red"></i>
                                        </a>
                                    </td>

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
<script>
    function confirmer(){
        return alert("Etudiant supprimer");
    }
</script>
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
