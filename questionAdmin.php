<?php
session_start();
require_once 'connection.php';

// Requete sql dans une variable
$sql = 'SELECT * FROM qcm ORDER BY numQuestion DESC ';
$sqlm = 'SELECT * FROM qcm WHERE numQuestion=:numQuestion';

// preparation du resultat
$query = $conn->prepare($sql);
$querym = $conn->prepare($sqlm);
// Execution de la requette
$query->execute();
$querym->bindParam(':numQuestion', $_GET['numQuestion']);

// Stockage du resultat dans une variable

$result = $query->fetchAll(PDO::FETCH_ASSOC);
$resultm = $querym->fetchAll(PDO::FETCH_ASSOC);


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


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

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
    <link rel="stylesheet" href="assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/libs/@form-validation/umd/styles/index.min.css" />
    <link rel="stylesheet" href="assets/vendor/libs/bs-stepper/bs-stepper.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>


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
                    <a class="dropdown-item" href="admin.php" target="_blank">
                        <i class="ti ti-mood-happy me-2 ti-sm"></i>
                        <span class="align-middle">Etudiant</span>
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
        <!---->
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

                        <h1>LISTE DES QUESTIONNAIRE</h1>
                        <?php // Affichage du message d'erreur
                        if (isset($_SESSION['add'])) {
                            echo '<div class="alert alert-success" role="alert" style="text-align: center;">' . $_SESSION['add'] . '</div>';
                            unset($_SESSION['add']);
                        }
                        ?>
                        <form>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                ajouter
                            </button>
                        </form>
                        <table class="table">
                            <thead>
                            <th>Numero</th>
                            <th>Question</th>
                            <th>Reponse1</th>
                            <th>Reponse2</th>
                            <th>Reponse3</th>
                            <th>Reponse4</th>
                            <th>Correcte</th>
                            <th>Niveau</th>
                            <th colspan="2" style="text-align: center">Action</th>
                            </thead>
                            <tbody>
                            <?php
                            // On fait une iteration sur la variable result
                            foreach ($result as $etudiant){
                                ?>
                                <tr>
                                    <td><?=$etudiant["numQuestion"] ?></td>
                                    <td><?=$etudiant["question"] ?></td>
                                    <td><?=$etudiant["reponse1"] ?></td>
                                    <td><?=$etudiant["reponse2"] ?></td>
                                    <td><?=$etudiant["reponse3"] ?></td>
                                    <td><?=$etudiant["reponse4"] ?></td>
                                    <td><?=$etudiant["reponse_correcte"] ?></td>
                                    <td><?=$etudiant["niveau"] ?></td>
                                    <td><a href="deleteAdmin.php?numQuestionnaire=<?= $etudiant['numQuestion']?>"  onclick="confirmer()"><i class="fas fa-trash-alt" style="color: red"></i></a></td>
                                    <td><a href="editerAdmin.php?numQuestion=<?= $etudiant['numQuestion']?>"<i class="fas fa-edit"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </section>

                </div>


                <!-- Add User Modal -->
                <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <form  method="post" action="addAdmin.php">
                                    <label for="question" class="form-label">Question : </label>
                                    <input class="form-control" type="text" id="question" placeholder="Saisissez la question " name="question" required>

                                    <label for="reponse1" class="form-label">Reponse 1 : </label>
                                    <input class="form-control" type="text" id="reponse1" placeholder="Saisissez la premiere reponse " name="reponse1" required>

                                    <label for="reponse2" class="form-label">Reponse 2 : </label>
                                    <input class="form-control" type="text" id="reponse2" placeholder="Saisissez la deuxieme reponse " name="reponse2" required>

                                    <label for="reponse3" class="form-label">Reponse 3 : </label>
                                    <input class="form-control" type="text" id="reponse3" placeholder="Saisissez la troisieme reponse " name="reponse3" required>

                                    <label for="reponse4" class="form-label">Reponse 4 : </label>
                                    <input class="form-control" type="text" id="reponse4" placeholder="Saisissez la quatrieme reponse " name="reponse4" required>

                                    <label for="reponse_correcte" class="form-label">Choisissez la bonne reponse : </label>
                                    <select class="form-control" id="reponse_correcte" name="reponse_correcte" >
                                        <option value="1">Reponse1</option>
                                        <option value="2">Reponse2</option>
                                        <option value="3">Reponse3</option>
                                        <option value="4">Reponse4</option>
                                    </select>
                                    <label for="niveau" class="form-label">Choisissez parmi les niveaux : </label>
                                    <select class="form-control" id="niveau" name="niveau" >
                                        <option value="L1">L1</option>
                                        <option value="L2">L2</option>
                                        <option value="L3">L3</option>
                                        <option value="M1">M1</option>
                                        <option value="M2">M2</option>
                                    </select><br>
                                    <button type="submit" name="ajout" class="btn-label-primary">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--/ Add User Modal -->


                <!-- Edit User Modal -->
                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                            </div>
                        </div>
                    </div>
                </div>
                <!--/ edit User Modal -->


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

    <script>
        function confirmer(){
            return alert("Question supprimer");
        }
    </script>
    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/vendor/libs/swiper/swiper.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
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
    <script src="assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="assets/vendor/libs/select2/select2.js"></script>
    <script src="assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <script src="assets/vendor/libs/bs-stepper/bs-stepper.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/pages-pricing.js"></script>
    <script src="assets/js/modal-create-app.js"></script>
    <script src="assets/js/modal-add-new-cc.js"></script>
    <script src="assets/js/modal-add-new-address.js"></script>
    <script src="assets/js/modal-edit-user.js"></script>
    <script src="assets/js/modal-enable-otp.js"></script>
    <script src="assets/js/modal-share-project.js"></script>
    <script src="assets/js/modal-two-factor-auth.js"></script>


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
