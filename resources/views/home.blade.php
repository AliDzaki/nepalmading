@extends('partials.navbar')
@section('title')
<title>Home</title>
@endsection
@section('content')
    <section class="w-full">

        <div class="container">
            <div class="py-5 px-10">
                <div class="flex flex-col sm:flex-row">
                    <div class="flex flex-col ">
                        <div class=" mt-10  align-middle justify-center ">

                            <h1 class="text-4xl font-bold text-gray-700" style="font-family:'Raleway', sans-serif;">Welcome to
                                <span class="text-4xl font-normal underline"
                                    style="font-family:'Raleway', sans-serif;">Mading<span
                                        class="text-4xl font-semibold">Nepal</span></span>
                            </h1>
                        </div>
                        <div class="flex mt-5  align-middle justify-center">
                            <p class="w-[485px]"><span class="text-base font-normal" style="font-family:'Raleway', sans-serif;">Mading<span class="font-semibold">Nepal</span></span> adalah sebuah website penyampaian informasi di lingkungan sekolah <span class="underline">SMK Negeri 4 Padalarang</span>  </p>

                        </div>
                        <div class="flex mt-5 justify-start">
                            <a href="/mading" class=" text-white py-2 px-5 bg-blue-500 rounded-full hover:underline">baca
                                selengkapnya <span>-></span></a>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="flex justify-center">
                            <img class="w-[350px]" src="{{ asset('assets/aset_home.jpg') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="hidden sm:block w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#38bdf8" fill-opacity="1"
                    d="M0,192L40,176C80,160,160,128,240,122.7C320,117,400,139,480,176C560,213,640,267,720,245.3C800,224,880,128,960,122.7C1040,117,1120,203,1200,240C1280,277,1360,267,1400,261.3L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
    
@endsection


