<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NepalMading | MyMading</title>
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
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col">
        <div class="absolute top-6 right-4 md:right-10">
            <a href="/mading"><h1 class="text-xl md:text-2xl font-normal" style="font-family: 'Raleway',sans-serif;">Nepal<span
                class="font-semibold" style="font-family: 'Raleway',sans-serif;">Mading</span></h1></a>
        </div>
        <div class="absolute top-6 left-4 md:left-10">
            <a href="/profile" class="relative"><span class="material-symbols-outlined text-3xl md:text-4xl hover:text-red-600">
                    arrow_back
                </span>
    
            </a>
        </div>
    </div>
    <div class="pt-24 w-full flex justify-center">
        <div class="border px-4 py-4 w-full max-w-2xl min-h-[370px] shadow-md shadow-gray-400 mx-6 sm: ">
            <div class="mb-4">
                <h1 class="text-xl md:text-2xl font-normal text-center underline" style="font-family:'Raleway', sans-serif;">My<span class="font-semibold" style="font-family:'Raleway', sans-serif;">Mading</span></h1>
            </div>
            
            <div class="relative shadow-md sm:rounded-lg overflow-x-auto w-full">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs md:text-sm text-gray-700 uppercase bg-gray-50 border-b border-slate-200">
                        <tr>
                            <th scope="col" class="px-2 md:px-6 py-2">
                                judul
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-2">
                                slug
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-2">
                                Kategori
                            </th>
                            <th scope="col" class="px-2 md:px-6 py-2 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mading as $informasi)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <th scope="row" class="px-2 md:px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $informasi->judul }}
                                </th>
                                <th scope="row" class="px-2 md:px-6 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $informasi->slug }} 
                                </th>
                                <td class="px-2 md:px-6 py-3">
                                    {{ $informasi->kategori }}
                                </td>
        
                                <td class="py-3 flex justify-between items-center gap-1 whitespace-nowrap">
                                    <a href="/mading/detail/{{ $informasi->slug }}">
                                        <span class="font-medium text-slate-700 bg-green-300 rounded-lg hover:underline px-2 md:px-4 py-2">Lihat</span>
                                    </a>
                                    <a href="/mading/edit/{{ $informasi->id }}">
                                        <span class="font-medium text-gray-300 bg-blue-600 rounded-lg hover:underline px-2 md:px-4 py-2">Edit</span>
                                    </a>
                                    
                                    <form action="/mading/hapus/{{ $informasi->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="hapus" class="px-2 md:px-4 py-2 font-medium text-gray-100 bg-red-600 rounded-lg button-submit hover:underline" id="">
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
