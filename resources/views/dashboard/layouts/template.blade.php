
<!-- Favicons -->
<link href="{{ asset("assets/img/logo-1.png") }}" rel="icon">
<link href="{{ asset("assets/img/logo-1.png") }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
<link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

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

<!-- Include SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Sweet alert --}}
<script src="{{ asset("https://unpkg.com/sweetalert/dist/sweetalert.min.js") }}"></script>

<!-- Vendor JS Files -->
<script src="{{ asset("assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/vendor/chart.js/chart.umd.js") }}"></script>
<script src="{{ asset("assets/vendor/echarts/echarts.min.js") }}"></script>
<script src="{{ asset("assets/vendor/quill/quill.min.js") }}"></script>
<script src="{{ asset("assets/vendor/simple-datatables/simple-datatables.js") }}"></script>
<script src="{{ asset("assets/vendor/tinymce/tinymce.min.js") }}"></script>
<script src="{{ asset("assets/vendor/php-email-form/validate.js") }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Template Main JS File -->
<script src="{{ asset("assets/js/main.js") }}"></script>


<script>

$(document).ready(function() {
    // Function to update the badge number
    function updateBadgeNumber(number) {
        $('#notificationBadge').text(number);
    }

    // AJAX call to fetch the data
    $.ajax({
        url: '{{route('getNotificationCount')}}', // Replace with your server endpoint
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Assuming the response contains the number you want to display
            var number = response.count;

            console.log(response.count);
            // Update the badge number
            updateBadgeNumber(number);
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error(xhr.responseText);
        }
    });
});

</script>

