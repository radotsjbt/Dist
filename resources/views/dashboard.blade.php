@extends('layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Congratulations {{Auth::user()->name}} 🎉</h5>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="/sneat/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.Echo) {
                initializeEcho();
            } else {
                console.error('Echo is not initialized');
            }
        });

        function initializeEcho() {
            const userId = "{{ auth()->id() }}"; // Pastikan ini benar sesuai dengan pengguna yang login
            console.log("Subscribing to private channel: user." + userId);
            window.Echo.private("user." + userId)
                .listen('.user.notification', (e) => {
                    console.log("Event event", e);
                    Swal.fire({
                        title: 'New Notification!',
                        text: e.message,
                        icon: 'info',
                        confirmButtonText: 'OK'
                    });
                });
        }
    </script>
@endsection
