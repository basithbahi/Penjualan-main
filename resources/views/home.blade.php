<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BERANDA | JESJESPOR</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('style/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('style/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('style/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('style/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('style/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/#[[latestVersion]]#/mdb.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <meta name="author" content="colorlib.com">
    <link href="{{ asset('style/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">
    <!-- =======================================================
  * Template Name: Nova
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/

  ======================================================== -->

    <style>
        html,
        body,
        .intro {
            height: 100%;
        }

        .form-control {
            border-color: transparent;
        }

        .input-group>.form-control:focus {
            border-color: transparent;
            box-shadow: inset 0 0 0 1px transparent;
        }

        .btn-link:hover {
            background-color: rgba(255, 255, 255, .35);
        }

        .btn-link:active,
        .btn-link.active {
            background-color: rgba(255, 255, 255, .35);
        }

        ` .btn-link:focus,
        .btn-link.focus {
            background-color: rgba(255, 255, 255, .35);
        }

        .btn-link:active:focus,
        .btn-link.active:focus {
            background-color: rgba(255, 255, 255, .35);
        }
    </style>
</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="d-flex align-items-center">JESJESPOR</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home" class="active">Home</a></li>
          <li><a href="#tentang">Tentang Kami</a></li>
          <li><a href="#footer">Hubungi Kami</a></li>
          <li><a href="login">Akun</a></li>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                {{ auth()->user()->nama }}
                <br>
              </span>
              <img class="rounded-circle" src="{{ asset('storage/' .auth()->user()->foto_profil) }}" alt="Foto Profil" width="50" height="50">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-center shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item text-center" href="#" style="margin-left: -20px;">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-black"></i>
                  <span class="text-black">Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-center" href="{{ route('logout') }}" style="margin-left: -20px;">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black"></i>
                  <span class="text-black">Logout</span>
                </a>
              </div>
              </li>

              </li>




        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h2 data-aos="fade-up">Pemesanan Tiket</h2>

                    <body class="text-center">
                    <form action="{{ route('jadwal.searchIndex') }}" method="GET">
                            <br>
                            <select name="stasiun" class="form-control">
                                <option value="1">Surabaya</option>
                                <option value="2">Malang</option>
                            </select>
                            <br>

                            <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" required
                                autofocus>

                            <br>




                            <br><br>
                            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                                <button type="submit" class="btn btn-primary">Pesan</button>
                                <!-- <a href="{{ route('transaksi.searchKodeBooking') }}" class="glightbox btn-watch-video d-flex align-items-center"> -->
                                <a href="cekKodeBooking" class="glightbox btn-watch-video d-flex align-items-center">
                                    <span>Cek Kode Booking</span></a>
                                <a href="seat" class="glightbox btn-watch-video d-flex align-items-center">
                                    <span>Kursi</span></a>
                            </div>


                        </form>


                </div>
            </div>
        </div>

    </section><!-- End Hero Section -->

    <main id="main">


        <!-- ======= Call To Action Section ======= -->
        <section id="tentang" class="call-to-action">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h3>Tentang Kami</h3>
                        <p>
                            Kesimpulan dari gagasan sistem JESJESPOR berbasis website untuk memudahkan pengguna memesan
                            tiket dengan membuat website yang mencakup layanan-layanan yang disediakan. Manfaat yang
                            diharapkan adalah dengan adanya implementasi gagasan ini pengguna dapat dengan mudah
                            mendapatkan tiket kereta api dan juga tidak banyak waktu mereka yang terbuang.
                        </p>
                        <a class="cta-btn" href="#footer">Hubungi Kami</a>
                    </div>
                </div>

            </div>
        </section><!-- End Call To Action Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span>Nova</span>
                        </a>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                            valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                        <div class="social-links d-flex  mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="home">Home</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="#">Web Design</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Web Development</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Product Management</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Marketing</a></li>
                            <li><i class="bi bi-dash"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Nova</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('style/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('style/assets/vendor/php-email-form/validate.js') }}"></script>
      <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('style/assets/js/main.js') }}"></script>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
    </a>
    </div>


</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/#[[latestVersion]]#/mdb.min.js">
</script>

</html>
