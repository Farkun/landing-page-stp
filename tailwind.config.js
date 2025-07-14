// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme'; // Penting: Pertahankan ini jika ada

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            // --- KUSTOMISASI WARNA ---
            colors: {
                'primary-red': '#B00020', // Merah utama, seperti bg-red-700
                'dark-red': '#8A0000',    // Merah gelap, seperti bg-red-800
                'light-cream': '#FFFBF5', // Cream/Kuning muda, seperti bg-yellow-50
                'gray-bg': '#F3F4F6',     // Abu-abu muda untuk latar belakang card
                'text-primary': '#333333', // Teks umum
                'text-secondary': '#666666', // Teks sekunder
                'white': '#ffffff', // Definisi eksplisit untuk putih
                'cream-text': '#FAE2A2',
                // Jika ingin menggunakan nama default Tailwind tapi dengan warna custom:
                // red: {
                //   700: '#B00020',
                //   800: '#8A0000',
                // },
                // yellow: {
                //   50: '#FFFBF5',
                // },
            },
            // --- KUSTOMISASI FONT ---
            fontFamily: {
                // Gunakan 'Inter' jika Anda mengimpornya dari Google Fonts
                // Hapus 'Figtree' jika Anda tidak membutuhkannya
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                // Jika Anda tidak mengimpor font eksternal, Anda bisa biarkan defaultTheme.fontFamily.sans saja
                // atau tentukan font sistem yang aman seperti:
                // sans: ['system-ui', 'sans-serif'],
            },
            // --- KUSTOMISASI Container ---
            container: {
                center: true,
                padding: '1rem', 
                screens: {
                    sm: '640px',
                    md: '768px',
                    lg: '1024px',
                    xl: '1200px', 
                    '2xl': '1200px', 
                },
            },
            // --- Spacing (opsional) ---
            // Jika Anda merasa jarak default Tailwind kurang pas, Anda bisa extend
            // spacing: {
            //   '7': '1.75rem', // Contoh: menambahkan nilai 28px
            // },
        },
    },
    plugins: [],
};