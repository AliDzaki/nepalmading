@extends('admin.admin')

@section('table')
    <div class="mb-4">
        <h1 class="text-2xl font-semibold text-center" style="font-family:'Raleway', sans-serif;">Users</h1>
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
                                <a class="flex flex-col" href="/admin/user/edit/{{ $user->id }}">
                                    <span
                                        class="font-medium text-gray-300 bg-blue-600 rounded-lg  hover:underline px-4 py-2">Edit</span>
                                </a>

                                <form class="flex flex-col" action="/user/hapus/{{ $user->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="hapus"
                                        class="px-4 py-2 font-medium text-gray-100  bg-red-600 rounded-lg button-submit  hover:underline"
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
