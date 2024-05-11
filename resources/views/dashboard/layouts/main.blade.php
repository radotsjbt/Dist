
@include('dashboard.layouts.header')
@include('dashboard.layouts.sidebar')
{{-- @include('dashboard.layouts.template') --}}

@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="h1">{{ $title }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container mt-4">
      @yield('container')
  </div>
</body>

</html>