<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @if (request()->routeIs('register.show'))
            Register
        @elseif (request()->routeIs('login.show'))
            Login
        @elseif (request()->routeIs('admin_login'))
            Admin Login
        @endif
    </title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div>
        <div class="main-content min-h-screen">
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
