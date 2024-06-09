@extends('admin.admin')

@section('table')
    <div class="mb-2">
        <h1 class="text-2xl font-semibold text-center" style="font-family:'Raleway', sans-serif;">Pengaju pembuat</h1>
    </div>
    <div class="flex justify-end mb-3">
        <div class=" z-10 px-3   bg-white divide-y divide-gray-100 rounded-lg shadow border inline-block text-center ">
            <ul class="py-2 text-base font-medium  text-gray-700 dark:text-gray-400 inline-flex ">
                <li>
                    <a href="/admin/user" class="block px-4 py-2 hover:bg-gray-100 border-r">Users</a>
                </li>
                <li>
                    <a href="/admin/user/pengaju-pembuat" class="block px-4 py-2 hover:bg-gray-100 ">Pengaju pembuat</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mb-2 ">
        <div class=" inline-flex gap-3 w-full justify-center px-auto">
            <div class="w-[320px] ">
                <form class="w-full mx-auto" action="/admin/user/pengaju-pembuat/cari" method="GET">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full h-[50px] p-4 pl-10 text-sm font-light text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-500 focus:border-sky-500"
                            placeholder="Cari berdasarkan nama, username..." required name="cari" />
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-[7px] bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>
                    </div>
                </form>
            </div>
            <div class="pt-[14px]">
                <a href="/admin/user/pengaju-pembuat" class="py-2 px-5 bg-red-500 text-white rounded-lg text-base cursor-pointer hover:bg-red-400 transition ease-in-out hover:text-white hover:shadow-lg">Reset</a>
            </div>
        </div>
    
    </div>
    <div class="relative shadow-md sm:rounded-lg overflow-x-auto w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 border-b border-slate-200 ">
                <tr>
                    <th scope="col" class="px-6 py-2">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-2">
                        role
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-2">
                        actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $user->nama }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $user->username }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $user->role }}
                        </td>
                        <td class="px-6 py-3">
                            {{ $user->password }}
                        </td>

                        <td class="  py-3 whitespace-nowrap">

                            <div class="flex flex-row gap-2">
                                

                                <form class="flex flex-col" action="/user/aproved/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" value="Terima"
                                        class="px-4 py-2 font-medium text-gray-100  bg-green-500 rounded-lg   hover:underline"
                                        id="">
                                </form>
                                <form class="flex flex-col" action="/user/denied/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" value="Tolak"
                                        class="px-4 py-2 font-medium text-gray-100  bg-red-600 rounded-lg  hover:underline"
                                        id="">
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.button-submit').on('click', function(e) {
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: 'Kamu yakin!?',
                text: "Kamu ingin menghapus data ini!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus itu!'
            }).then((result) => {
                if (result.value) {

                    form.submit();
                }
            });
        });
    </script>
@endsection
