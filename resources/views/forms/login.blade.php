@extends('forms.main-register-form')
@section('judul')
    <title>Login</title>
@endsection
@section('form')
    <div class="absolute top-6 right-10">
        <a href="/home" class="relative"><span class="material-symbols-outlined text-4xl hover:text-red-600">
                arrow_back
            </span>
        </a>
    </div>

    <div class="flex my-auto justify-center   w-full">
        <div
        class="border border-sky-200 inline-block py-10 px-8 mt-[120px] md:m-[80px] bg-white shadow-lg rounded-md h-auto lg:h-[399px] backdrop-blur-lg">
        <div class="mb-4">
            <h1 class="font-bold text-center text-2xl lg:text-4xl text-slate-800 mb-2" style="font-family: 'Raleway',sans-serif;">Login
            </h1>
            <p class="text-sm lg:text-base text-center font-sans text-slate-500" style="font-family: 'Reddit-sans',sans-serif;">Silahkan
                isi Username & password mu!!</p>
        </div>
        <form action="/Login/auth" method="POST">
            @csrf
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium ml-2 text-slate-700" for="user"
                    style="font-family: 'Reddit-sans',sans-serif;">Username</label>
                <input class="rounded-lg focus:border-sky-700 focus:ring-sky-300" type="text" name="username"
                    id="user">
            </div>
            <div class="flex flex-col mb-7">
                <label class="text-sm font-medium ml-2 text-gray-900" for="pass"
                    style="font-family: 'Reddit-sans',sans-serif;">Password</label>
                <input class="rounded-lg focus:border-sky-700 focus:ring-sky-300" type="password" name="password"
                    id="pass">
            </div>
            <div class="flex justify-center">
                <button
                    class="w-full shadow-sm bg-sky-500 py-2 text-slate-100 font-medium rounded-lg border border-sky-700 hover:bg-sky-400 hover:shadow-sky-800 hover:shadow-md hover:border-sky-400 transition ease-in-out"
                    type="submit" style="font-family: 'Raleway',sans-serif;">Log-in</button>
            </div>
            <div class="mt-2 text-center">
                <p class="text-sm lg:text-base font-normal" style="font-family: 'Reddit-sans',sans-serif;">Belum memiliki akun? ayo <a href="/Register"
                        href="" class="hover:underline text-blue-600"
                        style="font-family: 'Raleway',sans-serif;">daftar</a></p>
            </div>
        </form>
    </div>
    </div>
@endsection
