<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politeknik Bogor - Official Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <header class="bg-red-700 text-cream-text w-full py-4 fixed z-10">
        <nav class="container mx-auto flex justify-between items-center px-4">
            <div class="text-2xl font-bold">POLITEKNIK BOGOR</div>
            <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
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
        <div id="mobile-menu-overlay" class="md:hidden hidden bg-red-700 pb-4">
            <ul class="flex flex-col items-center space-y-4">
                <li><a href="#home" class="block text-cream-text hover:text-red-200 py-2">Home</a></li>
                <li><a href="#pmb" class="block text-cream-text hover:text-red-200 py-2">Dokumen PMB</a></li>
                <li><a href="#tahapan" class="block text-cream-text hover:text-red-200 py-2">Tahapan</a></li>
                <li><a href="#mitra" class="block text-cream-text hover:text-red-200 py-2">Mitra</a></li>
                <li><a href="#contact" class="block text-cream-text hover:text-red-200 py-2">Contact</a></li>
            </ul>
        </div>
    </header>
    <div style="padding-top: 64px;"></div>

    <section class="bg-red-800 text-cream-text py-16 overflow-hidden relative" id="home">
        <div id="hero-main-carousel" class="flex h-full w-full transition-transform duration-500 ease-in-out">

            <div class="flex-shrink-0 w-full">
                <div class="container mx-auto flex flex-col md:flex-row items-center px-4">
                    <div class="md:w-1/2 text-left pr-8 mb-8 md:mb-0">
                        <h1 class="text-5xl font-extrabold leading-tight mb-4">POLITEKNIK BOGOR</h1>
                        <p class="text-lg mb-6">Jl. KH. R. Abdullah Bin Nuh Jl. Yasmin Raya No.16A, RT.01/RW.04,
                            Curugmekar,
                            Kec. Bogor Bar., Kota Bogor, Jawa Barat 16113 <br><br>
                            Phone: 0811-1162-647</p>
                        <a href="https://pmb.stpbogor.siakad.tech/p/registrasi.php"><button
                                class="bg-white text-red-800 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300">Daftar
                                Sekarang</button></a>
                    </div>
                    <div class="md:w-1/2 flex items-center justify-center h-80 rounded-lg">
                        <img src="https://stpbogor.ac.id/wp-content/uploads/2024/09/1y-mkt-1024x1024.jpg.webp"
                            alt=""class="w-full h-full object-contain">
                    </div>
                </div>
            </div>

            <div class="flex-shrink-0 w-full h-full">
                <div class="container mx-auto h-96 rounded-lg">
                    <img src="https://store.bandccamera.com/cdn/shop/articles/landscape-photography-settings-164919.jpg?v=1659674922"
                        alt="..." class="w-full h-full object-cover">
                </div>
            </div>

            <div class="flex-shrink-0 w-full h-full">
                <div class="container mx-auto h-96 rounded-lg">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/p2/247/2024/09/24/IMG-20240924-WA0033-4132147207.jpg"
                        alt="..." class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        <button
            class="absolute top-1/2 left-4 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full shadow-lg z-30"
            id="prev-hero-main">‹</button>
        <button
            class="absolute top-1/2 right-4 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full shadow-lg z-30"
            id="next-hero-main">›</button>
    </section>

    <section class="bg-yellow-50 py-12">
        <div class="container mx-auto flex flex-col md:flex-row justify-around items-center text-center px-4">
            <div>
                <p class="text-5xl font-bold text-red-800">1.917.900</p>
                <p class="text-gray-700 mt-2">Animo Pendaftaran</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-red-800">452.867</p>
                <p class="text-gray-700 mt-2">Lulus Seleksi Adminitrasi</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-16" id="pmb">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-red-800 mb-12">Dokumen PMB 2025</h2>
            <div class="flex flex-col md:flex-row justify-between items-center text-center relative">

                <div class="relative w-full md:w-1/4 mb-8 md:mb-0">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="https://pmb.stpbogor.siakad.tech/p/registrasi.php" target="_blank"
                            class="absolute inset-0 z-20"></a>
                        <div class="text-red-600 text-5xl mb-4 flex justify-center items-center">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 288c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Pendaftaran Online</h3>
                        <p class="text-gray-600 text-sm">Calon Mahasiswa Baru melakukan pendaftaran pada website STP
                            Bogor.</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center justify-center h-full w-12 text-red-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
                <div class="relative w-full md:w-1/4 mb-8 md:mb-0">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="https://pmb.stpbogor.siakad.tech/admisi/bantuan/documentation.php#aktivasi"
                            target="_blank" class="absolute inset-0 z-20"></a>
                        <div class="text-red-600 text-5xl mb-4 flex justify-center items-center">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Prosedur PMB Online</h3>
                        <p class="text-gray-600 text-sm">Calon mahasiswa baru melakukan aktivasi ID dan Password melalui
                            notifikasi
                            yang dikirim ke alamat email yang di daftarkan.
                    </div>
                </div>
                <div class="hidden md:flex items-center justify-center h-full w-12 text-red-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
                <div class="relative w-full md:w-1/4 mb-8 md:mb-0">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        <a href="https://pmb.stpbogor.siakad.tech/p/login.php" target="_blank"
                            class="absolute inset-0 z-20"></a>
                        <div class="text-red-600 text-5xl mb-4 flex justify-center items-center">
                            <svg class="w-12 h-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path
                                    d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Login PMB</h3>
                        <p class="text-gray-600 text-sm">Calon mahasiswa baru login pada halaman login PMB.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-red-800 text-cream-text py-16" id="tahapan">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center mb-12">Tahapan Seleksi PMB STP Bogor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
                <div class="bg-red-700 p-6 rounded-lg shadow-md flex flex-col items-center text-center">
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
            <h2 class="text-4xl font-bold text-center text-red-800 mb-12">Testimoni Alumni</h2>
            <div id="testimonials-carousel" class="relative">
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-in-out" id="testimonial-slider">
                        <div class="w-full flex-shrink-0 md:w-1/3 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                                <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                                <h4 class="text-lg font-semibold">Nama Alumni 1</h4>
                                <p class="text-gray-600 text-sm mb-2">Angkatan 2020</p>
                                <p class="text-gray-700 italic">"Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
                            </div>
                        </div>
                        <div class="w-full flex-shrink-0 md:w-1/3 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                                <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                                <h4 class="text-lg font-semibold">Nama Alumni 2</h4>
                                <p class="text-gray-600 text-sm mb-2">Angkatan 2019</p>
                                <p class="text-gray-700 italic">"Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                            </div>
                        </div>
                        <div class="w-full flex-shrink-0 md:w-1/3 p-4">
                            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                                <div class="w-20 h-20 bg-gray-300 rounded-full mx-auto mb-4"></div>
                                <h4 class="text-lg font-semibold">Nama Alumni 3</h4>
                                <p class="text-gray-600 text-sm mb-2">Angkatan 2021</p>
                                <p class="text-gray-700 italic">"Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="absolute top-1/2 left-0 -translate-y-1/2 bg-gray-300 p-2 rounded-full shadow-lg"
                    id="prev-testimonial">‹</button>
                <button class="absolute top-1/2 right-0 -translate-y-1/2 bg-gray-300 p-2 rounded-full shadow-lg"
                    id="next-testimonial">›</button>
            </div>
        </div>
    </section>

    <section class="bg-yellow-50 py-16" id="mitra">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-red-800 mb-12">Mitra</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-items-center">
                <img src="https://via.placeholder.com/150x80?text=Logo1" alt="Partner Logo 1"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Logo2" alt="Partner Logo 2"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Logo3" alt="Partner Logo 3"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Logo4" alt="Partner Logo 4"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Logo5" alt="Partner Logo 5"
                    class="h-20 object-contain">
                <img src="https://via.placeholder.com/150x80?text=Logo6" alt="Partner Logo 6"
                    class="h-20 object-contain">
            </div>
        </div>
    </section>

    <footer class="bg-red-800 text-cream-text py-12" id="contact">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">POLITEKNIK BOGOR</h3>
                <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-red-200">FB</a>
                    <a href="#" class="hover:text-red-200">TW</a>
                    <a href="#" class="hover:text-red-200">IG</a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul>
                    <li><a href="#" class="hover:text-red-200">About Us</a></li>
                    <li><a href="#" class="hover:text-red-200">Admissions</a></li>
                    <li><a href="#" class="hover:text-red-200">Academics</a></li>
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
                <p class="text-sm">Jl. Raya Bogor KM 10</p>
                <p class="text-sm">Bogor, Jawa Barat</p>
                <p class="text-sm">Email: info@poltekbogor.ac.id</p>
                <p class="text-sm">Phone: (0251) 123-4567</p>
            </div>
        </div>
        <div class="text-center text-sm mt-8 pt-8 border-t border-red-700">
            &copy; 2025 Politeknik Bogor. All Rights Reserved.
        </div>
    </footer>

</body>

</html>