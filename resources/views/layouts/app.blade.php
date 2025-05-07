<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    @if (request()->routeIs('dashboard'))
        Dashboard
    @elseif (request()->routeIs('books.index'))
        Table Buku
    @elseif (request()->routeIs('books.create'))
        Buat buku
    @elseif (request()->routeIs('user'))
        Table User
    @endif
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .sidebar {
            width: 16rem;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: white;
            border-right: 1px solid #e5e7eb;
            z-index: 20;
        }

        .sidebar-content {
            margin-top: 4rem;
        }

        .main-content {
            margin-left: 16rem;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 50;
        }

        .table-container {
            overflow-x: auto;
        }

        .content-area {
            margin-top: 4rem;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">

    <div>
        @include('sweetalert::alert')
        @include('layouts.sidebar')

        <div class="main-content min-h-screen">
            @include('layouts.header')

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const dropdown = document.getElementById('dropdown');
            const profileDropdown = document.getElementById('profileDropdown');

            if (!profileDropdown.contains(e.target) && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });

        const input = document.getElementById('cover');
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('icon-placeholder');

        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>

</html>
