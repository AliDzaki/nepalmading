<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Reddit+Sans:ital,wght@0,200..900;1,200..900&family=Source+Code+Pro:wght@600&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-sky-50" style="font-family: 'Raleway',sans-serif;">
    <div class="absolute top-6 left-10">
        <a href="/" class="relative"><span class="material-symbols-outlined text-4xl hover:text-red-600">
                arrow_back
            </span>

        </a>
    </div>
    <div class="py-6 px-6 md:px-16 h-[450px] md:h-[550px] mt-[70px] md:mt-[0px] lg:px-32 xl:px-48 flex align-middle ">
        <div class="bg-white shadow-xl p-6 rounded gap-6 w-full min-h-[12rem] flex flex-col items-center border">
            <div class="relative w-full flex justify-center">
                <div class="w-32 md:w-48 relative group h-32 md:h-48 rounded-full overflow-hidden bg-gray-100 border border-gray-200">
                    <img class="w-full h-full rounded-lg shadow-xl" src="{{ asset('assets/profile-user.png') }}"
                        alt="Default Profile" />
                </div>
                <div class="absolute right-4 md:right-12 top-0 z-10 rounded-full shadow-md">
                    <button class="w-10 h-10 md:w-16 md:h-16">
                        <a href="/logout">
                            <span class="material-symbols-outlined text-red-500">
                                logout
                            </span>
                        </a>
                    </button>
                </div>
            </div>
            <div class="w-full justify-center flex">
                <h1 class="text-xl md:text-2xl font-semibold">{{ auth()->user()->nama }}</h1>
            </div>

            <div class="w-full mt-4">
                <div class="flex flex-col">
                    <div class="flex flex-row gap-5 ">
                        <div class="flex flex-col w-full md:w-[50%] text-center">
                            <p class="text-sm md:text-xl font-normal">Username:</p>
                            <h3 class="text-sm md:text-2xl font-semibold">{{ auth()->user()->username }}</h3>
                        </div>
                        <div class="flex flex-col w-full md:w-[50%] text-center">
                            <p class="text-sm md:text-xl font-normal">Role:</p>
                            <h3 class="text-sm md:text-2xl font-semibold">{{ auth()->user()->role }}</h3>
                        </div>
                    </div>
                    @can('my-mading')
                        <div class="flex flex-row gap-5 w-full justify-center mt-5">
                            <a href="/mading/mymading"
                                class="text-lg md:text-xl font-medium hover:underline transition ease-in-out">MyMading</a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</body>

</html>
