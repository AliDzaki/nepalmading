<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @include('fonts.font')
</head>

<body>
    <div class="container">
        <div class="absolute top-6 right-10">
            <h1 class="text-2xl font-normal" style="font-family: 'Raleway',sans-serif;">Nepal<span
                    class="text-2xl font-semibold" style="font-family: 'Raleway',sans-serif;">Mading</span></h1>
        </div>
        <div class="absolute top-6 left-10">
            <a href="/mading" class="relative"><span class="material-symbols-outlined text-4xl hover:text-red-600">
                    arrow_back
                </span>

            </a>
        </div>
        <div class="py-16 px-16 ">
            
                     
            <div class="flex justify-center  w-full">
                <div>
                    <h1 class="mb-2 text-4xl font-bold text-gray-800" style="font-family: 'Raleway', sans-serif;">{{ $mading->judul }} </h1>
                    <img class="w-[600px] h-[600px] object-cover" src="{{ asset('img/'. $mading->gambar) }}" alt="mading-gambar"> 

                    <p class="text-center text-lg text-normal text-gray-900"
                        style="font-family: 'Redit-sans',sans-serif;">{{ $mading->pembuat }} | <span class="text-lg">{{ \Carbon\Carbon::parse($mading->created_at)->formatLocalized('%d-%B-%Y')  }}</span>
                    </p>
                    <div class="w-[600px]">
                        {!! $mading->konten !!}
                    </div>
                </div>

            </div>
           
        </div>

    </div>
</body>

</html>
