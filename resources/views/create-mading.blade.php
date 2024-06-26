@extends('partials.navbar')
@section('components')
    @include('fonts.font')
    <title>Mading | Create</title>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="flex justify-center  relative  ">

        <div
            class="inline-block  py-10 px-8 m-[75px] border border-gray-200 shadow-lg rounded-md  backdrop-blur-lg">
            <form action="/mading/create/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <h1 class="font-bold text-center text-4xl text-slate-800  mb-2"
                        style="font-family: 'Raleway',sans-serif;">Informasi</h1>
                    <p class="text-base text-center font-sans text-slate-500" style="font-family: 'Reddit-sans',sans-serif;">
                        Sampaikan informasi dengan baik dan benar!</p>
                </div>
                <div class="flex flex-col mb-3">
                    <label class="text-sm font-medium ml-2  text-gray-900" for="gambar"
                        style="font-family: 'Reddit-sans',sans-serif;">Gambar</label>
                        
                        <img class="img-preview object-cover w-[175px] my-3">
                        
                    
                    <input onchange="previewImage()" class="rounded-lg focus:border-sky-700 focus:ring-sky-300" type="file" name="gambar" id="gambar" >
                    @error('gambar')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col mb-3">
                    <label class="text-sm font-medium  ml-2 text-slate-700 " for="judul"
                        style="font-family: 'Reddit-sans',sans-serif;">Judul</label>
                    <input
                        class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('judul')
                    bg-red-50 border border-red-500  
                @enderror"
                        type="text" name="judul" id="judul" value="{{ old('judul') }}">
                    @error('judul')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col mb-3">
                    <label class="text-sm font-medium ml-2  text-gray-900" for="kategori"
                        style="font-family: 'Reddit-sans',sans-serif;">Kategori</label>
                    <select class="rounded-lg focus:border-sky-700 focus:ring-sky-300" type="text" name="kategori_id"
                        id="kategori">
                        @foreach ($kategori as $item)
                            <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                        @endforeach

                    </select>
                    @error('kategori')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>



                <div class="flex flex-col mb-3">
                    <label class="text-sm font-medium ml-2  text-gray-900" for="konten"
                        style="font-family: 'Reddit-sans',sans-serif;">Keterangan</label>
                    <input type="text" name="konten" id="konten" value="" hidden>
                    <trix-editor input="konten"
                        class="trix-content h-[250px] @error('konten')
                        bg-red-50 border border-red-500  
                    @enderror" style="width: 100%;
                    max-width: 585px;
                    min-height: 250px;
                    height: auto;
                    overflow-wrap: break-word;
                    word-wrap: break-word;"></trix-editor>
                    @error('konten')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button
                        class="w-full shadow-sm bg-sky-500 py-2 text-slate-100 font-medium  rounded-lg border border-sky-700 hover:bg-sky-400 hover:shadow-sky-800 hover:shadow-md hover:border-sky-400 transition ease-in-out "
                        type="submit" style="font-family: 'Raleway',sans-serif;">Simpan</button>
                </div>

            </form>
        </div>

    </div>
@endsection
@section('js')
    <script>
        document.addEventListener('trix-file-accept'function(e) {
            e.prefentDefault();
        });
    </script>
    <script>
        function previewImage(){
            const image = document.querySelector('#gambar');
            const img_preview = document.querySelector('.img-preview');

            img_preview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent){
                img_preview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
