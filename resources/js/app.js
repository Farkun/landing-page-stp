import './bootstrap';
// resources/js/app.js

document.addEventListener('DOMContentLoaded', () => {
    const testimonialSlider = document.getElementById('testimonial-slider');
    const prevButton = document.getElementById('prev-testimonial');
    const nextButton = document.getElementById('next-testimonial');

    if (testimonialSlider && prevButton && nextButton) {
        let currentIndex = 0;
        const slides = testimonialSlider.children;
        const totalSlides = slides.length;

        // Function to update carousel display
        const updateCarousel = () => {
            // Adjust this based on how many slides you want to show at once
            // For example, if showing 3, translate by currentIndex * (100% / 3)
            // For simplicity, this example will just shift one by one
            const slideWidth = slides[0].clientWidth; // Get width of one slide
            testimonialSlider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        };

        // Handle next button click
        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateCarousel();
        });

        // Handle previous button click
        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateCarousel();
        });

        // Initial setup
        updateCarousel(); // Position correctly on load
        window.addEventListener('resize', updateCarousel); // Recalculate on resize

        // --- HERO MAIN CAROUSEL ---
        const heroMainSlider = document.getElementById('hero-main-carousel');
        const prevButtonHeroMain = document.getElementById('prev-hero-main');
        const nextButtonHeroMain = document.getElementById('next-hero-main');

        if (heroMainSlider && prevButtonHeroMain && nextButtonHeroMain) {
            let currentIndexHeroMain = 0; // Default: selalu dimulai dari slide pertama (Main Content)
            const slidesHeroMain = heroMainSlider.children;
            const totalSlidesHeroMain = slidesHeroMain.length;

            const updateHeroMainCarousel = () => {
                const slideWidthHeroMain = heroMainSlider.offsetWidth;
                heroMainSlider.style.transform = `translateX(-${currentIndexHeroMain * slideWidthHeroMain}px)`;

                // Untuk carousel looping, tombol navigasi tidak perlu disembunyikan
                // Mereka selalu terlihat karena ada opsi untuk loop
                prevButtonHeroMain.style.display = 'block'; // Selalu terlihat
                nextButtonHeroMain.style.display = 'block'; // Selalu terlihat
            };

            nextButtonHeroMain.addEventListener('click', () => {
                // Jika sudah di slide terakhir, kembali ke slide pertama (currentIndex = 0)
                // Jika tidak, maju ke slide berikutnya
                currentIndexHeroMain = (currentIndexHeroMain + 1) % totalSlidesHeroMain;
                updateHeroMainCarousel();
            });

            prevButtonHeroMain.addEventListener('click', () => {
                // Jika sudah di slide pertama, pergi ke slide terakhir (totalSlides - 1)
                // Jika tidak, mundur ke slide sebelumnya
                currentIndexHeroMain = (currentIndexHeroMain - 1 + totalSlidesHeroMain) % totalSlidesHeroMain;
                updateHeroMainCarousel();
            });

            // Initial setup and on window resize
            // Pastikan ini tetap ada agar posisi carousel benar saat dimuat atau diubah ukurannya
            updateHeroMainCarousel();
            window.addEventListener('resize', updateHeroMainCarousel);
        }

        // --- Hamburger Menu ---
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

        if (mobileMenuButton && mobileMenuOverlay) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenuOverlay.classList.toggle('hidden'); // Menambah/menghapus kelas 'hidden'
            });
        }

    }
});