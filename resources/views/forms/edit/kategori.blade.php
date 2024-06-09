<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori | Edit</title>
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
    <div class="flex justify-center  relative ">
        <div class="absolute top-6 right-10">
            <h1 class="text-2xl font-normal" style="font-family: 'Raleway',sans-serif;">Nepal<span
                    class="text-2xl font-semibold" style="font-family: 'Raleway',sans-serif;">Mading</span></h1>
        </div>
        <div class="absolute top-6 left-10">
            <a href="/admin/kategori" class="relative"><span class="material-symbols-outlined text-4xl hover:text-red-600">
                    arrow_back
                </span>

            </a>
        </div>
        
        <div
            class=" inline-block py-10 px-8 mt-[80px] border border-gray-200 shadow-lg rounded-md  backdrop-blur-lg bg-slate-50 ">
            <form action="/admin/kategori/edited/{{ $kategori->id_kategori }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <h1 class="font-bold text-center text-4xl text-slate-800  mb-2"
                        style="font-family: 'Raleway',sans-serif;">Kategori</h1>
                    <p class="text-base text-center font-sans text-slate-500"
                        style="font-family: 'Reddit-sans',sans-serif;">Editlah   kategori dengan baik dan benar!</p>
                </div>

                
                <div>
                    <div class="flex flex-col mb-3">
                        <label class="text-sm font-medium  ml-2 text-gray-700" for="idKategori"
                            style="font-family: 'Reddit-sans',sans-serif;">Id kategori</label>
                        <input class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('id_kategori')
                            bg-red-50 border border-red-500
                        @enderror" type="text"
                            name="id_kategori" id="idKategori" value="{{ $kategori->id_kategori }}">
                            @error('id_kategori')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="flex flex-col mb-7">
                        <label class="text-sm font-medium ml-2  text-gray-900" for="kategori"
                            style="font-family: 'Reddit-sans',sans-serif;">Kategori</label>
                        <input class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('kategori')
                            bg-red-50 border border-red-500
                        @enderror" type="text" name="kategori"
                            id="kategori" value="{{ $kategori->kategori }}">
                            @error('kategori')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                    </div>
                </div>

                <div class="flex justify-center">
                    <button
                        class="w-full shadow-sm bg-sky-500 py-2 text-slate-100 font-medium  rounded-lg border border-sky-700 hover:bg-sky-400 hover:shadow-sky-800 hover:shadow-md hover:border-sky-400 transition ease-in-out "
                        type="submit" style="font-family: 'Raleway',sans-serif;">Simpan</button>
                </div>

            </form>
        </div>
       

    </div>

</body>

</html>
