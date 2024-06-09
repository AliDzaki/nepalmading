@extends('admin.admin')

@section('table')
    <div class="mb-4">
        <h1 class="text-2xl font-semibold text-center" style="font-family:'Raleway', sans-serif;">Mading</h1>
    </div>
    <div class="mb-4 px-[11rem] flex flex-row justify-between">
        <a href="/mading/create"
            class="py-2 px-5 bg-blue-400 text-white hover:underline border hover:shadow-lg rounded-xl">+tambah</a>
            <a href="/pdf" class="py-2 px-5 bg-blue-400 text-white hover:underline border hover:shadow-lg rounded-xl">Print</a>
    </div>
    <div class="relative shadow-md sm:rounded-lg overflow-x-auto w-full">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50 border-b border-slate-200 ">
                <tr>
                    <th scope="col" class="px-6 py-2">
                        judul
                    </th>
                    <th scope="col" class="px-6 py-2">
                        slug
                    </th>
                    <th scope="col" class="px-6 py-2">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-2 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mading as $informasi)
                    <tr class="odd:bg-white even:bg-gray-50  border-b ">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $informasi->judul }}
                        </th>
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $informasi->slug }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $informasi->kategori }}
                        </td>

                        <td class= "py-3  whitespace-nowrap ps-8 flex justify-between items-center gap-1">
                            <a href="/mading/detail/{{ $informasi->slug }}">
                                <span
                                    class="font-medium text-slate-700 bg-green-300 rounded-lg  hover:underline px-4 py-2">Lihat</span>
                            </a>
                            <a href="/mading/edit/{{ $informasi->id }}">
                                <span
                                    class="font-medium text-gray-300 bg-blue-600 rounded-lg  hover:underline px-4 py-2">Edit</span>
                            </a>
                            {{-- <a href="/mading/hapus/{{ $informasi->id }}" data-confirm-delete="true">
                                <span
                                    class="font-medium text-gray-100 bg-red-600 rounded-lg  hover:underline px-4 py-2">Hapus</span>
                            </a> --}}
                            <form action="/mading/hapus/{{ $informasi->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <input type="submit" value="hapus"
                                    class="px-4 py-2 font-medium text-gray-100  bg-red-600 rounded-lg button-submit  hover:underline"
                                    id="">
                            </form>
                            {{-- <form action="/mading/hapus/{{ $informasi->id }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" 
                                    class="px-4 py-2 font-medium text-gray-100  bg-red-600 rounded-lg  hover:underline" >Hapus</button>
                            </form> --}}
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
