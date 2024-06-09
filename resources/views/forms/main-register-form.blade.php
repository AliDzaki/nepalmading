<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('judul')
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Source+Code+Pro:wght@700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Reddit+Sans:ital,wght@0,200..900;1,200..900&family=Source+Code+Pro:wght@700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body class="bg-sky-50">
    @include('sweetalert::alert')
    <div class="flex justify-center  relative ">
        <div class="absolute top-8 md:top-6 left-10">
            <h1 class="text-xl md:text-2xl font-normal" style="font-family: 'Raleway',sans-serif;">Nepal<span
                    class="text-xl md:text-2xl font-semibold" style="font-family: 'Raleway',sans-serif;">Mading</span></h1>
        </div>
        @yield('form')
        

    </div>
</body>

</html>
