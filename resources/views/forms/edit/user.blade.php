@extends('forms.edit.main-forms-mading')

@section('content')
<div class="absolute top-6 left-10">
    <a href="/admin/user"><span class="material-symbols-outlined text-6xl hover:text-red-600">
            arrow_back
        </span></a>
</div>
<div
        class="border border-sky-200 inline-block py-10 px-8 m-[80px] bg-white  shadow-lg rounded-md 
          backdrop-blur-lg">
        <div class="mb-4">
            <h1 class="font-bold text-center text-4xl text-slate-800  mb-2" style="font-family: 'Raleway',sans-serif;">User
            </h1>
            <p class="text-base text-center font-sans text-slate-500" style="font-family: 'Reddit-sans',sans-serif;">Silahkan
                Edit data user dengan bijak!!</p>
        </div>
        <form action="/admin/user/edited/{{ $user->id }}" method="POST">
            @csrf
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium  ml-2 text-slate-700" for="nama"
                    style="font-family: 'Reddit-sans',sans-serif;">Name</label>
                <input name="nama"
                    class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('nama')
                    bg-red-50 border border-red-500
                @enderror"
                    type="text" id="nama" value="{{ $user->nama }}" disabled readonly>
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
                    type="text" name="username" id="user" value="{{ $user->username }}" disabled readonly>
                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>           
            <div class="flex flex-col mb-3">
                <label class="text-sm font-medium  ml-2 text-slate-700" for="role"
                    style="font-family: 'Reddit-sans',sans-serif;">Role</label>
                <select class="py-2 px-3 rounded-lg focus:border-sky-700 focus:ring-sky-300" name="role" id="role">
                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                    <option value="pembuat">pembuat</option>
                </select>
                @error('username')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>           
            <div class="flex flex-col mb-7">
                <label class="text-sm font-medium ml-2  text-gray-900" for="pass"
                    style="font-family: 'Reddit-sans',sans-serif;">Password</label>
                <input
                    class="rounded-lg focus:border-sky-700 focus:ring-sky-300 @error('password')
                bg-red-50 border border-red-500
            @enderror"
                    type="password" name="password" id="pass" value="{{ $user->password }}" disabled readonly>
                @error('password')
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
@endsection