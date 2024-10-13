<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sekolah')</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap-Select CSS (Only include once) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Main Layout -->
    <div class="container-fluid mx-auto py-8 flex justify-center items-center">
        @section('content')
        @show
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <script>
        // Toggle for the small screen menu
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });

        // Toggle for the user dropdown menu
        const userMenuToggle = document.getElementById('user-menu-toggle');
        const userMenu = document.getElementById('user-menu');

        if (userMenuToggle) {
            userMenuToggle.addEventListener('click', function() {
                userMenu.classList.toggle('hidden');
            });
        }
    </script>
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker(); // Inisialisasi selectpicker
    });
</script>

    <!-- Bootstrap Select JS (Only include once) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
</body>
</html>
