@extends('partials.navbar')

@section('content')
    <div class="container">
        <div class="py-5 grid grid-cols-2   ms-[175px] ">

            <div class="border  px-4 py-4 w-[775px]">
                @yield('table')
            </div>

            <div class="flex justify-end mt-10 me-8">
                <div
                    class=" z-10  font-medium bg-white divide-y divide-gray-100 rounded-lg shadow w-60 text-center h-[155px]">
                    <ul class="py-2 text-lg text-gray-700 dark:text-gray-400 ">
                        <li>
                            <a href="/admin/mading" class="block px-4 py-2 hover:bg-gray-100 border-b">Mading</a>
                        </li>
                        <li>
                            <a href="/admin/kategori" class="block px-4 py-2 hover:bg-gray-100 border-b">Kategori</a>
                        </li>
                        <li>
                            <a href="/admin/user" class="block px-4 py-2 hover:bg-gray-100 ">Users</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @yield('js')
@endsection