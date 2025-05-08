<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Home
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body>
    <div>

        <div class="main-content min-h-screen">
            @include('layouts.header')
            <main class="p-6">
                @yield('content')
                @if (session('welcome'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Halo!',
                            text: '{{ session('welcome') }}',
                            confirmButtonColor: '#6366F1'
                        });
                    </script>
                @endif
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }
        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdown');
            const profileDropdown = document.getElementById('profileDropdown');

            if (!profileDropdown.contains(e.target) && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });

        function showLoginAlert() {
            Swal.fire({
                icon: 'warning',
                title: 'Login Dulu Ya!',
                text: 'Kamu harus login untuk melihat detail buku.',
                confirmButtonColor: '#6366F1',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        }

        function confirmLogout() {
            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                text: "Anda akan diarahkan ke halaman utama!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Iya, keluar',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna klik "Iya", submit form logout
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>

</html>
