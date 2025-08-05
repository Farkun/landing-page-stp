<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politeknik Bogor - Official Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        .running {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .running>div {
            width: 100%;
            flex-wrap: wrap;
            translate: 0 0;
        }
    </style>
</head>

<body class="font-sans antialiased">

    {{-- <header class="bg-red-700 text-cream-text w-full py-4 fixed z-10"> --}}
        <header class="w-full py-4 fixed z-40 top-0 left-0" style="
                background-color: {{ $app_setting->primary_color }};
                color: {{ $app_setting->primary_content_color }};
            ">
        <nav class="container mx-auto flex items-center px-4">
            <div class="text-2xl font-bold flex-grow text-center md:text-left">
                {{ $app_setting->app_name }}
            </div>

            <button id="mobile-menu-button" type="button"
                class="md:hidden text-white p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-white transition duration-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <ul id="main-nav-links" class="hidden md:flex space-x-6">
                <li><a href="#home" class="hover:text-red-200">Home</a></li>
                <li><a href="#pmb" class="hover:text-red-200">Dokumen PMB</a></li>
                <li><a href="#tahapan" class="hover:text-red-200">Tahapan</a></li>
                <li><a href="#mitra" class="hover:text-red-200">Mitra</a></li>
                <li><a href="#contact" class="hover:text-red-200">Contact</a></li>
            </ul>
        </nav>

        <div id="mobile-menu-overlay"
            class="md:hidden hidden pb-4 fixed left-0 w-full overflow-y-auto transition-all duration-300 ease-in-out"
            style="
                background-color: {{ $app_setting->primary_color }};
                z-index: 30;
                top: calc(1rem * 4 + 0.5rem * 2); /* py-4 (padding) + p-2 (button padding) + sedikit lebih */
                max-height: calc(100vh - (1rem * 4 + 0.5rem * 2)); /* tinggi_layar - tinggi_navbar_fixed */
                /* Anda bisa menyesuaikan nilai calc() ini */
            ">
            <ul class="flex flex-col items-center space-y-4 pt-4">
                <li><a href="#home" class="block py-2 text-xl hover:text-red-200" style="color: {{ $app_setting->primary_content_color }};">Home</a></li>
                <li><a href="#pmb" class="block py-2 text-xl hover:text-red-200" style="color: {{ $app_setting->primary_content_color }};">Dokumen PMB</a></li>
                <li><a href="#tahapan" class="block py-2 text-xl hover:text-red-200" style="color: {{ $app_setting->primary_content_color }};">Tahapan</a></li>
                <li><a href="#mitra" class="block py-2 text-xl hover:text-red-200" style="color: {{ $app_setting->primary_content_color }};">Mitra</a></li>
                <li><a href="#contact" class="block py-2 text-xl hover:text-red-200" style="color: {{ $app_setting->primary_content_color }};">Contact</a></li>
            </ul>
        </div>
    </header>
    <div style="padding-top: 64px;"></div>

    <section class="py-16 overflow-hidden relative" id="home" style="background-color: {{ $app_setting->primary_color }}; color: {{ $app_setting->primary_content_color }};">
        <div id="hero-main-carousel" class="flex h-full w-full transition-transform duration-500 ease-in-out">

            <div class="flex-shrink-0 w-full">
                <div class="container mx-auto flex flex-col md:flex-row items-center px-4">
                    <div class="md:w-1/2 text-left pr-8 mb-8 md:mb-0" data-aos="fade-up">
                        <h1 class="text-5xl font-extrabold leading-tight mb-4">{{ $hero->heading }}</h1>
                        <p class="text-lg mb-6">{!! $hero->body !!}</p>
                        <a href="{{ $hero->button_url }}"><button
                                class="bg-white font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300" style="color: {{ $app_setting->primary_color }}">{{ $hero->button_label }}</button></a>
                    </div>
                    <div class="md:w-1/2 flex items-center justify-center h-96 rounded-lg">
                        <img src="{{ $hero->image_url }}"
                            alt=""class="w-full h-full object-contain">
                    </div>
                </div>
            </div>

            @foreach ($carousel_image as $image)
                <div class="flex-shrink-0 w-full h-full">
                    <div class="container mx-auto h-96 rounded-lg">
                        <img src="{{ $image->url }}"
                            alt="..." class="w-full h-full object-cover">
                    </div>
                </div>
            @endforeach

        </div>

        <button
            class="absolute top-1/2 left-4 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full shadow-lg z-30"
            id="prev-hero-main">‹</button>
        <button
            class="absolute top-1/2 right-4 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full shadow-lg z-30"
            id="next-hero-main">›</button>
    </section>

    {{-- <section class="bg-yellow-50 py-12"> --}}
    <section class="bg-yellow-50 py-12" style="background-color: {{ $app_setting->secondary_content_color }};">
        <div class="container mx-auto flex flex-col md:flex-row justify-around items-center text-center px-4">
            <div>
                <p class="text-5xl font-bold" style="color: {{ $app_setting->primary_color }};">
                    <span id="counter1" data-target="{{ $hero->animo }}">0</span></p>
                <p class="text-gray-700 mt-2">Animo Pendaftaran</p>
            </div>
            <div>
                <p class="text-5xl font-bold" style="color: {{ $app_setting->primary_color }};">
                    <span id="counter2" data-target="{{ $hero->selected }}">0</span></p>
                <p class="text-gray-700 mt-2">Lulus Seleksi Adminitrasi</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16" id="pmb">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" style="color: {{ $app_setting->primary_color }};">Dokumen PMB 2025</h2>
            <div class="flex flex-col md:flex-row justify-between items-center text-center relative">

                <div class="relative w-full md:w-1/4 mb-8 md:mb-0" data-aos="zoom-in">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="{{ $documents[0]->url ?? '#' }}" target="_blank" class="absolute inset-0 z-20"></a>
                        <div class="text-5xl mb-4 flex justify-center items-center" style="color: {{ $app_setting->secondary_color }};">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $documents[0]->title ?? 'Default Title 1' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $documents[0]->description ?? 'Default Desc 1' }}</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center justify-center h-full w-12" style="color: {{ $app_setting->secondary_color }};">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>

                <div class="relative w-full md:w-1/4 mb-8 md:mb-0" data-aos="zoom-in">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="{{ $documents[1]->url ?? '#' }}" target="_blank" class="absolute inset-0 z-20"></a>
                        <div class="text-5xl mb-4 flex justify-center items-center" style="color: {{ $app_setting->secondary_color }};">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $documents[1]->title ?? 'Default Title 2' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $documents[1]->description ?? 'Default Desc 2' }}</p>
                    </div>
                </div>

                <div class="hidden md:flex items-center justify-center h-full w-12" style="color: {{ $app_setting->secondary_color }};">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>

                <div class="relative w-full md:w-1/4 mb-8 md:mb-0" data-aos="zoom-in">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="{{ $documents[2]->url ?? '#' }}" target="_blank" class="absolute inset-0 z-20"></a>
                        <div class="text-5xl mb-4 flex justify-center items-center" style="color: {{ $app_setting->secondary_color }};">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $documents[2]->title ?? 'Default Title 3' }}</h3>
                        <p class="text-gray-600 text-sm">{{ $documents[2]->description ?? 'Default Desc 3' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16" id="tahapan" style="background-color:{{ $app_setting->primary_color }};color:{{ $app_setting->primary_content_color }};">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Tahapan Seleksi PMB STP Bogor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pendaftaran atau Regristasi</h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Isi Formulir</h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Bayar Pendaftaran</h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Isi Biodata</h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">
                        Ujian Online - Jalur test
                        <br>
                        Upload Berkas - Jalur tanpa test
                    </h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
                <div class="p-6 rounded-lg shadow-md flex flex-col items-center text-center" style="background-color:{{ $app_setting->secondary_color }};" data-aos="zoom-out">
                    <div class="w-24 h-24 bg-gray-400 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-200" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 4 4 4-4V5h-2v7l-2-2-4 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Pengumuman Hasil Ujian Online</h3>
                    <!-- <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" style="color:{{ $app_setting->primary_color }};">
                Testimoni Alumni
            </h2>
            
            <div id="testimonials-carousel" class="relative">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" id="testimonial-slider" data-aos="zoom-in">

                        @foreach ($reviews as $review)
                            <div class="w-full flex-shrink-0 md:w-1/3 p-4">
                                <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                                     @if ($review->image)
                                        <img src="{{ asset($review->image) }}" 
                                            alt="{{ $review->name }}" 
                                            class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                                    @else
                                    {{-- Foto Profil (jika ada kolom image di tabel) --}}
                                    <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                                    @endif

                                    {{-- Nama Alumni --}}
                                    <h4 class="text-lg font-semibold">{{ $review->name }}</h4>

                                    {{-- Angkatan (jika kosong, tampilkan '-') --}}
                                    <p class="text-gray-600 text-sm mb-2">
                                        Angkatan {{ $review->graduated_at ?? '-' }}
                                    </p>

                                    {{-- Pesan Testimoni --}}
                                    <p class="text-gray-700 italic">"{{ $review->message }}"</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- Tombol Navigasi Carousel --}}
                @if ($reviews->count() > 1)
                    <button class="absolute top-1/2 left-0 -translate-y-1/2 bg-gray-300 p-2 rounded-full shadow-lg"
                        id="prev-testimonial">‹</button>
                    <button class="absolute top-1/2 right-0 -translate-y-1/2 bg-gray-300 p-2 rounded-full shadow-lg"
                        id="next-testimonial">›</button>
                @endif
            </div>
        </div>
    </section>

    <section class="py-16" id="mitra" style="background-color:{{ $app_setting->secondary_content_color }};">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12" style="color:{{ $app_setting->primary_color }};">Mitra</h2>
            <div class="running">
                <div class="flex gap-8 items-center justify-center overflow-x-hidden" data-aos="fade-up">
                    @foreach ($partners as $pt)
                        <a href="{{ $pt->url }}" target="_blank">
                            <img src="{{ $pt->logo }}" alt="Partner Logo 1"
                                class="h-20 object-contain">
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12" id="contact" style="background-color:{{ $app_setting->primary_color }};color:{{ $app_setting->primary_content_color }};">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">POLITEKNIK BOGOR</h3>
                <p class="text-sm mb-4">Penerimaan Mahasiswa Baru Sekolah Tinggi Pariwisata Bogor.</p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-red-200">Facebook</a>
                    <a href="#" class="hover:text-red-200">TW</a>
                    <a href="#" class="hover:text-red-200">IG</a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul>
                    <li><a href="#" class="hover:text-red-200">Portal Siakad (Mahasiswa)</a></li>
                    <li><a href="#" class="hover:text-red-200">Portal Siakad (Orang Tua)</a></li>
                    <li><a href="#" class="hover:text-red-200">Tutorial Siakad Student</a></li>
                    <li><a href="#" class="hover:text-red-200">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Resources</h4>
                <ul>
                    <li><a href="#" class="hover:text-red-200">Student Portal</a></li>
                    <li><a href="#" class="hover:text-red-200">Faculty Login</a></li>
                    <li><a href="#" class="hover:text-red-200">Library</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <p class="text-sm">Jl. KH. R. Abdullah Bin Nuh Jl. Yasmin Raya No.16A, RT.01/RW.04,
                            Curugmekar,</p>
                <p class="text-sm">Kec. Bogor Bar. Kota Bogor, Jawa Barat 16113</p>
                <br>
                <p class="text-sm">Email: info@poltekbogor.ac.id</p>
                <p class="text-sm">Phone: 0811-1162-647</p>
            </div>
        </div>
        <div class="text-center text-sm mt-8 pt-8" style="border-top: 1px solid {{ $app_setting->secondary_color }};">
            &copy; 2025 Politeknik Bogor. All Rights Reserved.
        </div>
    </footer>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            document.addEventListener("DOMContentLoaded", function () {
                AOS.init({
                    duration: 1000, // Durasi animasi (1 detik)
                    once: false,    // Animasi akan di-trigger setiap muncul di viewport
                });
            });
    </script>
</body>

</html>