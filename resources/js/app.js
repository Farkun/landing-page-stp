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
            mobileMenuOverlay.classList.add('opacity-0', 'h-0', 'pointer-events-none'); 

            mobileMenuButton.addEventListener('click', () => {
                if (mobileMenuOverlay.classList.contains('hidden')) {
                    mobileMenuOverlay.classList.remove('hidden'); 

                    mobileMenuOverlay.offsetHeight;

                    mobileMenuOverlay.classList.remove('opacity-0', 'h-0', 'pointer-events-none');
                    mobileMenuOverlay.classList.add('opacity-100', 'h-auto', 'pointer-events-auto'); 

                } else {
                    // Sembunyikan menu
                    mobileMenuOverlay.classList.remove('opacity-100', 'h-auto', 'pointer-events-auto');
                    mobileMenuOverlay.classList.add('opacity-0', 'h-0', 'pointer-events-none'); 

                    mobileMenuOverlay.addEventListener('transitionend', function handler() {
                        if (mobileMenuOverlay.classList.contains('opacity-0')) { 
                            mobileMenuOverlay.classList.add('hidden');
                        }
                        mobileMenuOverlay.removeEventListener('transitionend', handler);
                    }, { once: true });
                }
            });

            // Optional: Close menu when a link inside is clicked (for single page navigation)
            const mobileMenuLinks = mobileMenuOverlay.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (!mobileMenuOverlay.classList.contains('hidden')) { 
                        mobileMenuOverlay.classList.remove('opacity-100', 'h-auto', 'pointer-events-auto');
                        mobileMenuOverlay.classList.add('opacity-0', 'h-0', 'pointer-events-none');
                        mobileMenuOverlay.addEventListener('transitionend', function handler() {
                            if (mobileMenuOverlay.classList.contains('opacity-0')) {
                                mobileMenuOverlay.classList.add('hidden');
                            }
                            mobileMenuOverlay.removeEventListener('transitionend', handler);
                        }, { once: true });
                    }
                });
            });
        }

        const counters = document.querySelectorAll('[id^="counter"]');

    if (counters.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 
        };

        const animateNumber = (element) => {
            const target = parseInt(element.dataset.target);
            const duration = 1000; 
            let startTimestamp = null;

            const formatNumber = (num) => {
                return new Intl.NumberFormat('id-ID').format(num); 
            };

            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = timestamp - startTimestamp;
                const percentage = Math.min(progress / duration, 1); 
                const currentNumber = Math.floor(percentage * target);

                element.textContent = formatNumber(currentNumber);

                if (percentage < 1) {
                    requestAnimationFrame(step);
                } else {
                    element.textContent = formatNumber(target); 
                }
            };

            requestAnimationFrame(step);
        };

        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const targetValue = parseInt(entry.target.dataset.target);
                    if (!isNaN(targetValue) && targetValue > 0) { 
                         animateNumber(entry.target);
                    } else {
                        entry.target.textContent = new Intl.NumberFormat('id-ID').format(targetValue);
                    }
                    observer.unobserve(entry.target); 
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }

    }
});