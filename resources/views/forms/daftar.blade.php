@extends('forms.main-register-form')
@section('judul')
    <title>Daftar</title>
@endsection
@section('form')
    <div
        class="border border-sky-200 inline-block py-10 px-8 m-[80px] bg-white  shadow-lg rounded-md 
          backdrop-blur-lg">
        <div class="mb-4">
            <h1 class="font-bold text-center text-4xl text-slate-800  mb-2" style="font-family: 'Raleway',sans-serif;">Daftar
            </h1>
            <p class="text-base text-center font-sans text-slate-500" style="font-family: 'Reddit-sans',sans-serif;">Silahkan
                buat Username & password mu!!</p>
        </div>
        <form action="/Register/store" method="POST" id="form">
            @csrf
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium  ml-2 text-slate-700" for="nama"
                    style="font-family: 'Reddit-sans',sans-serif;">Name</label>
                <input name="nama"
                    class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('nama')
                    bg-red-50 border border-red-500
                @enderror"
                    type="text" id="nama">
                @error('nama')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium  ml-2 text-slate-700" for="user"
                    style="font-family: 'Reddit-sans',sans-serif;">Username</label>
                <input
                    class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('username')
                bg-red-50 border border-red-500
            @enderror"
                    type="text" name="username" id="user">
                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>           
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium ml-2  text-gray-900" for="pass"
                    style="font-family: 'Reddit-sans',sans-serif;">Password</label>
                <input
                    class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('password')
                bg-red-50 border border-red-500
            @enderror"
                    type="password" name="password" id="pass">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- <div class="flex flex-col items-center mb-7">
                <input
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                    type="checkbox" name="password" id="pass">
                <label class="text-sm font-medium ml-2  text-gray-900" for="pass"
                    style="font-family: 'Reddit-sans',sans-serif;">Saya ingin mengajukan menjadi pembuat informasi</label>
                
                    
                
            </div> --}}
            <div class="flex items-center mb-7">
                <input id="penulis-checkbox" type="checkbox" value="true" name="pengajuan_penulis" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="penulis-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" style="font-family: 'Reddit-sans',sans-serif;">Saya ingin mengajukan menjadi pembuat informasi</label>
            </div>
            <div class="flex justify-center">
                <button
                    class="w-full shadow-sm bg-sky-500 py-2 text-slate-100 font-medium  rounded-lg border border-sky-700 hover:bg-sky-400 hover:shadow-sky-800 hover:shadow-md hover:border-sky-400 transition ease-in-out "
                    type="submit" style="font-family: 'Raleway',sans-serif;">Daftar</button>
            </div>
            <div class="mt-2 text-center">
                <p class="text-base font-normal" style="font-family: 'Reddit-sans',sans-serif;">Sudah memiliki akun?
                    ayo <a href="/Login" class="hover:underline text-blue-600"
                        style="font-family: 'Raleway',sans-serif;">login</a></p>
            </div>
        </form>
    </div>
@endsection
