<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Havmate | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
</head>
<body>
    
<!-- Favicons -->
<link href="{{ asset("assets/img/logo-1.png") }}" rel="icon">
<link href="{{ asset("assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href={{ asset('https://fonts.gstatic.com') }} rel="preconnect">
<link href={{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }} rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/quill/quill.snow.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/quill/quill.bubble.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
<link href="{{ asset("assets/vendor/simple-datatables/style.css") }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">

{{-- Sweet alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Vendor JS Files -->
<script src="{{ asset("assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/vendor/chart.js/chart.umd.js") }}"></script>
<script src="{{ asset("assets/vendor/echarts/echarts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/quill/quill.min.js") }}"></script>
<script src="{{ asset("assets/vendor/simple-datatables/simple-datatables.js") }}"></script>
<script src="{{ asset("assets/vendor/tinymce/tinymce.min.js") }}"></script>
<script src="{{ asset("assets/vendor/php-email-form/validate.js") }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset("assets/js/main.js") }}"></script>
{{--     
               <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome {{ auth()->user()->username }}
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                   
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                      </form>
                    </li>
                  </ul>
                </li>
              
                @else
                <a class="nav-link {{ ($title === "Login" ? 'active' : '') }}" href="/login">Login</a>
              </li> 

              </ul>
              @endauth
          </div>
        </div>
    </nav> --}}


<div class="container mt-4">
    @yield('container')
</div>


</body>
</html>