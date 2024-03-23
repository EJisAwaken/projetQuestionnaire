<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-wide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="front-pages">
  <head>
    <meta charset="utf-8" />
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

    <link rel="stylesheet" href="./assets/vendor/fonts/tabler-icons.css" />



    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/front-page.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets/vendor/css/pages/front-page-landing.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/front-config.js"></script>
  </head>

  <body>
    <script src="assets/vendor/js/dropdown-hover.js"></script>
    <script src="assets/vendor/js/mega-dropdown.js"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
      <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
          <!-- Menu logo wrapper: Start -->
          <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="assets/img/logo.png " alt="logo" style="width: 100px">
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">EJ QUEST</span>
            </a>
          </div>

          <div class="landing-menu-overlay d-lg-none"></div>
          <!-- Menu wrapper: End -->
          <!-- Toolbar: Start -->
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- navbar button: Start -->
            <li>
              <a href="login.php" class="btn btn-primary" target="_blank"
                ><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span
                ><span class="d-none d-md-block">S"inscrire/S'enregistrer</span></a
              >
            </li>
            <!-- navbar button: End -->
          </ul>
          <!-- Toolbar: End -->
        </div>
      </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
      <!-- Hero: Start -->
      <section id="hero-animation">
        <div id="landingHero" class="section-py landing-hero position-relative">
          <div class="container">
            <div class="hero-text-box text-center">
              <h1 class="text-primary hero-title display-6 fw-bold mt-5">Découvrez notre questionnaire interactif qui vous permettra de tester vos connaissances en informatique.</h1>
              <h2 class="hero-sub-title h6 mb-4 pb-1">
                  Répondez aux questions et <br class="d-none d-lg-block" />
                  mesurez votre expertise dès maintenant !
              </h2>
              <div class="landing-hero-btn d-inline-block position-relative">
                  <img
                    src="../../assets/img/front-pages/icons/Join-community-arrow.png"
                    alt="Join community arrow"
                    class="scaleX-n1-rtl"
                /></span>
                <a href="login.php" class="btn btn-primary btn-lg">Commencer</a>
              </div>
            </div>
          </div>
        </div>
        <div class="landing-hero-blank"></div>
      </section>
      <!-- Hero: End -->
      <!-- Contact Us: Start -->

      <section id="landingContact" class="section-py bg-body landing-contact" style="margin-top: 400px">
        <div class="container">
          <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">Contactez - nous</span>
          </div>
          <p class="text-center mb-4 mb-lg-5 pb-md-3">Avez - vous des suggestions? Envoyé nous un message par le biais de ce formulaire</p>
          <div class="row gy-4">
            <div class="col-lg-5">
              <div class="contact-img-box position-relative border p-2 h-100">
                <img
                  src="../../assets/img/front-pages/landing-page/contact-customer-service.png"
                  alt="contact customer service"
                  class="contact-img w-100 scaleX-n1-rtl" />
                <div class="pt-3 px-4 pb-1">
                  <div class="row gy-3 gx-md-4">
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="ti ti-mail ti-sm"></i></div>
                        <div>
                          <p class="mb-0">Email</p>
                          <h5 class="mb-0">
                            <a href="mailto:example@gmail.com" class="text-heading">safiry879@gmail.com</a>
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-success rounded p-2 me-2">
                          <i class="ti ti-phone-call ti-sm"></i>
                        </div>
                        <div>
                          <p class="mb-0">Téléphone : </p>
                          <h5 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+261 34 50 035 13</a></h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1">Formulaire</h4>


                  <form method="POST" action="mailIndex.php?">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="contact-form-fullname">Nom et prenom</label>
                        <input type="text" class="form-control" id="contact-form-fullname" name="name" placeholder="Esoalahy" />
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="contact-form-email">Email</label>
                        <input
                          type="text"
                          id="contact-form-email"
                          class="form-control"
                          name="courrier"
                          placeholder="johndoe@gmail.com" />
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="contact-form-message">Message</label>
                        <textarea
                          id="contact-form-message"
                          class="form-control"
                          rows="8"
                          name="message"
                          placeholder="Entrer votre message : "></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="sent">Envoyé</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact Us: End -->
    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
      <div class="footer-bottom py-3">
        <div
          class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
          <div class="mb-2 mb-md-0">
            <span class="footer-text"
              >©
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
            <a href="https://pixinvent.com" target="_blank" class="fw-medium text-white footer-link"></a>
            <span class="footer-text"> </span>
          </div>
          <div>
            <a href="https://github.com/pixinvent" class="footer-link me-3" target="_blank">
              <img
                src="assets/img/front-pages/icons/github-light.png"
                alt="github icon"
                data-app-light-img="front-pages/icons/github-light.png"
                data-app-dark-img="front-pages/icons/github-dark.png" />
            </a>
            <a href="https://www.facebook.com/pixinvents/" class="footer-link me-3" target="_blank">
              <img
                src="assets/img/front-pages/icons/facebook-light.png"
                alt="facebook icon"
                data-app-light-img="front-pages/icons/facebook-light.png"
                data-app-dark-img="front-pages/icons/facebook-dark.png" />
            </a>
            <a href="https://twitter.com/pixinvents" class="footer-link me-3" target="_blank">
              <img
                src="assets/img/front-pages/icons/twitter-light.png"
                alt="twitter icon"
                data-app-light-img="front-pages/icons/twitter-light.png"
                data-app-dark-img="front-pages/icons/twitter-dark.png" />
            </a>
            <a href="https://www.instagram.com/pixinvents/" class="footer-link" target="_blank">
              <img
                src="assets/img/front-pages/icons/instagram-light.png"
                alt="google icon"
                data-app-light-img="front-pages/icons/instagram-light.png"
                data-app-dark-img="front-pages/icons/instagram-dark.png" />
            </a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Core JS -->
    <!-- Footer: End -->

    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="assets/js/front-main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/front-page-landing.js"></script>
  </body>
</html>
