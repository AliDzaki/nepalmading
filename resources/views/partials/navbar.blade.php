<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Source+Code+Pro:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @yield('components')
    @vite('resources/css/app.css')
</head>

<body>
    @include('sweetalert::alert')

    <nav class="bg-white border-gray-300 border-b relative">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex items-center justify-between w-full md:w-auto">
                <h1 class="text-lg font-normal" style="font-family:'Raleway', sans-serif;">Mading<span
                        class="text-lg font-semibold">Nepal</span></h1>
                <button type="button"
                    class="inline-flex items-center justify-center p-2 ml-3 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-user" aria-expanded="false" onclick="toggleNavbar()">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto absolute md:relative top-14 md:top-0 shadow-lg md:shadow-none left-0 bg-white md:bg-transparent z-50 transition-transform ease-in-out duration-700" id="navbar-user">
                <ul class="flex flex-col gap-4 font-medium p-4 md:p-0 mt-4 border border-sky-100 rounded-lg bg-white md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white"
                    style="font-family: 'Raleway', sans-serif;">
                    <li class="group">
                        <a href="/" class="relative flex flex-col items-center group-hover:text-sky-400">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                            <p class="mt-1 group-hover:underline">Home</p>
                        </a>
                    </li>
                    <li class="group">
                        <a href="/mading" class="relative flex flex-col items-center group-hover:text-sky-400">
                            <span class="material-symbols-outlined">
                                full_coverage
                            </span>
                            <p class="mt-1 group-hover:underline">Mading</p>
                        </a>
                    </li>
                    @can('create-mading')
                    <li class="group">
                        <a href="/mading/create" class="relative flex flex-col items-center group-hover:text-sky-400">
                            <span class="material-symbols-outlined">
                                add_circle
                            </span>
                            <p class="mt-1 group-hover:underline">Create</p>
                        </a>
                    </li>
                    @endcan
                    @can('admin')
                    <li class="group">
                        <a href="/admin/mading" class="relative flex flex-col items-center group-hover:text-sky-400">
                            <span class="material-symbols-outlined">
                                monitoring
                            </span>
                            <p class="mt-1 group-hover:underline">Admin</p>
                        </a>
                    </li>
                    @endcan
                    @auth
                    <li class="group">
                        <a href="/profile" class="relative flex flex-col items-center group-hover:text-sky-400">
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                            <p class="mt-1 group-hover:underline">Profile</p>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="/Login" class="relative flex flex-col items-center">
                            <span class="py-2 px-4 bg-sky-400 border hover:shadow-lg rounded-lg text-white">Login</span>
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    @yield('js')

    <script>
        function toggleNavbar() {
            const navbar = document.getElementById('navbar-user');
            navbar.classList.toggle('hidden');
        }
    </script>
</body>

</html>
