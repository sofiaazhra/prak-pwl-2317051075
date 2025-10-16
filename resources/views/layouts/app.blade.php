<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>

    {{-- Bootstrap CSS --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    {{-- Custom CSS --}}
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        main {
            flex: 1;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #007bff, #00c6ff);
        }
        .navbar-custom .navbar-brand, 
        .navbar-custom .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .footer {
            background: #343a40;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        /* styling for SweetAlert2 custom popup */
        .swal2-custom-popup {
            border-radius: 14px !important;
            box-shadow: 0 12px 40px rgba(2,6,23,0.18) !important;
            padding: 1.2rem 1.6rem !important;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        .swal2-popup .swal2-title {
            font-weight: 700;
            font-size: 1.15rem;
            color: #0b2545;
        }
        .swal2-popup .swal2-html-container {
            color: #243142;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Main Content --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- SweetAlert2 flash notifications (inserted directly into layout) --}}
    @if(session('success') || session('error') || $errors->any())
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: {!! json_encode(session('success')) !!},
                        showConfirmButton: false,
                        timer: 2200,
                        position: 'center',
                        backdrop: true,
                        customClass: { popup: 'swal2-custom-popup' }
                    });
                @endif

                @if(session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: {!! json_encode(session('error')) !!},
                        showConfirmButton: true,
                        confirmButtonText: 'Tutup',
                        position: 'center',
                        backdrop: true,
                        customClass: { popup: 'swal2-custom-popup' }
                    });
                @endif

                @if($errors->any())
                    let msgs = '';
                    @foreach($errors->all() as $err)
                        msgs += {!! json_encode($err) !!} + '<br>';
                    @endforeach

                    Swal.fire({
                        icon: 'warning',
                        title: 'Terjadi Kesalahan',
                        html: msgs,
                        showConfirmButton: true,
                        confirmButtonText: 'Tutup',
                        position: 'center',
                        backdrop: true,
                        customClass: { popup: 'swal2-custom-popup' }
                    });
                @endif
            });
        </script>
    @endif

</body>
</html>