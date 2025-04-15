<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pendataan Warga</title>
    <link rel="icon" href="../../../img/iconpenduduk.png" type="image/png">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    {{-- datatabels --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Scripts -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="ttransition-opacity duration-300 opacity-0 font-sans antialiased bg-gray-50 dark:bg-gray-800 ">
    <x-dark-mode> </x-dark-mode>
    <main class="md:ml-56 h-auto">

        <x-navbar></x-navbar>
        <x-saidbar></x-saidbar>

        <div class="w-full mt-14">
            <!-- Page Content -->
            @isset($header)
                <header class="bg-putih dark:bg-gray-900 transition-colors duration-300  mt-0">
                    <div class="max-w-7xl mx-auto py-6  px-8 pl-10 ">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <main>

                {{ $slot }}
            </main>
        </div>

    </main>
    <!-- Inisialisasi DataTables -->
    <!-- Inisialisasi DataTables -->
    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script> --}}

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
    <script>
        $(document).ready(function() {
            $('body').removeClass('opacity-0'); // Hilangkan opacity-0 saat halaman siap
        });
    </script>
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {
            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });



        document.addEventListener('DOMContentLoaded', function() {
            const passIn = document.getElementById('password');
            const btn = document.getElementById('togglePassword');

            btn.addEventListener('click', function() {
                const type = passIn.getAttribute('type') === 'password' ? 'text' : 'password';
                passIn.setAttribute('type', type);

                // Toggle visibility of the icons
                const icons = btn.getElementsByTagName('svg');
                for (let icon of icons) {
                    icon.classList.toggle('hidden');
                }
            });

            const loginForm = document.getElementById('loginForm');
            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();
                loginForm.reset(); // Reset the form
                alert('Form submitted');
            });
        });


        // unutk confirmasi hapus data

        function showModal(deleteUrl) {
            document.getElementById('confirmationModal').classList.remove('hidden');
            document.getElementById('deleteForm').action = deleteUrl;
        }

        document.getElementById('cancelDelete').onclick = function() {
            document.getElementById('confirmationModal').classList.add('hidden');
        };
    </script>


</body>

</html>
