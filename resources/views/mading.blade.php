@extends('partials.navbar')
@section('components')
    @include('fonts.font')
@endsection

@section('content')
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 mt-[40px]">
            <div class="h-[225px] flex lg:hidden"></div>
            <div class="w-auto py-4 px-2 lg:w-[885px]">
                <div class="grid gap-3 grid-cols-2 lg:grid-cols-3 " id="all_data_parent">
                    @foreach ($mading as $informasi)
                        <div class="max-w-sm h-[355px] md:h-fit bg-white border border-gray-200 rounded-lg shadow  ">
                            <a href="">
                                <img class="rounded-t-lg h-[170px] md:h-[270px] w-[350px] object-cover"
                                    src="{{ asset('img/' . $informasi->gambar) }}" alt="" />
                            </a>
                            <div class="p-5">

                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{ $informasi->judul }}
                                    </h5>
                                </a>
                                <div class="flex flex-wrap gap-2 md:justify-between">
                                    <p class="my-auto text-xs font-light text-slate-400"
                                        style="font-family: 'Redit-sans', sans-serif;">
                                        {{ \Carbon\Carbon::parse($informasi->created_at)->formatLocalized('%d-%B-%Y') }}</p>
                                    <p
                                        class="inline-block bg-sky-200 shadow-md text-xs font-normal py-1 px-3 rounded-lg mb-[6px] text-slate-700 ">
                                        {{ $informasi->kategori }}</p>
                                </div>
                                <a href="/mading/detail/{{ $informasi->slug }}"
                                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 hover:shadow-lg hover:shadow-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-300 mt-3">
                                    Baca selengkapnya
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach



                </div>
                <div class="grid gap-3 grid-cols-2 lg:grid-cols-3 hasil_cari" id="hasil_cari">

                </div>

            </div>

            <div class="absolute top-[80px] w-[300px] right-[37px] lg:right-0  py-4 px-2 md:w-[425px]">
                <div class="mb-4">
                    <div class="w-full mx-auto">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search_btn"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-sky-500 focus:sky-blue-500 "
                                placeholder="Cari berdasarkan judul, tanggal" required />

                        </div>

                    </div>

                </div>
                <div>
                    <form action="/mading/filtering" class="w-full mx-auto">

                        <h3 class="text-lg font-normal" style="font-family:'Raleway', sans-serif;">Filter</h3>
                        <label for="kategori" class="ml-1 mt-4 text-base font-normal"
                            style="font-family: 'Raleway', sans-serif;">Kategori</label>
                        <select id="kategori"
                            class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            style="font-family: 'Redit-sans', sans-serif;" name="filter">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id_kategori }}">{{ $item->kategori }}</option>
                            @endforeach


                        </select>
                        <div class="flex justify-between mt-2">
                            <a href="/mading"
                                class=" py-2 px-5 bg-red-500 text-white rounded-lg text-base cursor-pointer hover:bg-red-400 transition ease-in-out hover:text-white hover:shadow-lg">Reset</a>

                            <input type="submit" value="Filter"
                                class=" py-2 px-5 bg-green-500 text-white rounded-lg text-base cursor-pointer hover:bg-green-400 transition ease-in-out hover:text-white hover:shadow-lg">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#search_btn").on('keyup', function() {
            $search = $(this).val();

            if ($search) {
                $('#all_data_parent').hide();
                $('#hasil_cari').show();
            } else {
                $('#all_data_parent').show();
                $('#hasil_cari').hide();
            }
            $.ajax({
                url: "{{ URL::to('search') }}",
                type: "GET",
                data: {
                    'search': $search
                },
                success: function(data) {
                    $("#hasil_cari").html(data);

                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
