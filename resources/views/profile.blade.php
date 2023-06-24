<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile | JESJESPOR</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('style/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('style/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{ asset('style/app.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

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
        body {
            background-color: #123456;
            color: #ffffff;
        }

        .center-table {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #000;
            color: #ffffff;
        }

        th, td {
            border: 2px solid #000;
            padding: 8px;
            text-align: left;
            color: #ffffff; /* Tambahkan untuk mengubah warna teks */
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-button {
            margin-top: 20px;
        }

        .edit-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .edit-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="home" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="d-flex align-items-center">JESJESPOR</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home" class="active">Home</a></li>
          <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                {{ auth()->user()->nama }}
                <br>
              </span>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}">
                <div class="d-flex align-items-center">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-4 text-black"></i>
                &nbsp &nbsp &nbsp &nbsp
                <span class="text-black">Logout</span>
                </div>
            </a>
            </div>
              </li>
           <br>
        </ul>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
    <div class="center-table">
        <h2>Profile</h2>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    @if (Auth::check())
                        <tr>
                            <td style="color: white;">NIK:</td>
                            <td style="color: white;">{{ Auth::user()->nik }}</td>
                        </tr>
                        <tr>
                            <td style="color: white;">Nama:</td>
                            <td style="color: white;">{{ Auth::user()->nama }}</td>
                        </tr>
                        <tr>
                            <td style="color: white;">Alamat:</td>
                            <td style="color: white;">{{ Auth::user()->alamat }}</td>
                        </tr>
                        <tr>
                            <td style="color: white;">TTL:</td>
                            <td style="color: white;">{{ Auth::user()->ttl }}</td>
                        </tr>
                        <tr>
                            <td style="color: white;">JK:</td>
                            <td style="color: white;">{{ Auth::user()->jk }}</td>
                        </tr>
                        <tr>
                            <td style="color: white;">Email:</td>
                            <td style="color: white;">{{ Auth::user()->email }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="edit-button">
            <a href="{{ route('user.editProfile', ['user' => Auth::user()]) }}">Edit</a>
        </div>
    </div>
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
</body>
</html>
