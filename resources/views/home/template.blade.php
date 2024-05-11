<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Havmate</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href={{ asset("assets1/img/logo-2.png") }} rel="icon">
  <link href={{ asset("assets1/img/apple-touch-icon.png") }} rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href={{ asset("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i") }} rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href={{ asset("assets1/vendor/aos/aos.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/bootstrap/css/bootstrap.min.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/bootstrap-icons/bootstrap-icons.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/boxicons/css/boxicons.min.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/glightbox/css/glightbox.min.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/remixicon/remixicon.css") }} rel="stylesheet">
  <link href={{ asset("assets1/vendor/swiper/swiper-bundle.min.css") }} rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href={{ asset("assets1/css/style.css") }} rel="stylesheet">
</head>

<body>
<div class="content">
  @yield('content')
</div>
</body>


  <!-- Vendor JS Files -->
  <script src={{ asset("assets1/vendor/aos/aos.js") }}></script>
  <script src={{ asset("assets1/vendor/bootstrap/js/bootstrap.bundle.min.js") }}></script>
  <script src={{ asset("assets1/vendor/glightbox/js/glightbox.min.js") }}></script>
  <script src={{ asset("assets1/vendor/isotope-layout/isotope.pkgd.min.js") }}></script>
  <script src={{ asset("assets1/vendor/swiper/swiper-bundle.min.js") }}></script>
  <script src={{ asset("assets1/vendor/waypoints/noframework.waypoints.js") }}></script>
  <script src={{ asset("assets1/vendor/php-email-form/validate.js") }}></script>

  <!-- Template Main JS File -->
  <script src={{ asset("assets1/js/main.js") }}></script>
