// public/js/app.js

document.addEventListener('DOMContentLoaded', () => {
    const testimonialSlider = document.getElementById('testimonial-slider');
    const prevButton = document.getElementById('prev-testimonial');
    const nextButton = document.getElementById('next-testimonial');

    if (testimonialSlider && prevButton && nextButton) {
        let currentIndex = 0;
        const slides = testimonialSlider.children;
        const totalSlides = slides.length;
        let slidesPerView = 1; // Default for mobile

        const updateSlidesPerView = () => {
            if (window.innerWidth >= 768) { // md breakpoint
                slidesPerView = 3; // Show 3 testimonials on desktop
            } else {
                slidesPerView = 1;
            }
        };

        const updateCarousel = () => {
            updateSlidesPerView(); // Update slidesPerView on resize
            const slideWidth = testimonialSlider.offsetWidth / slidesPerView;
            testimonialSlider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

            // Adjust nav button visibility
            prevButton.style.display = currentIndex === 0 ? 'none' : 'block';
            nextButton.style.display = currentIndex >= (totalSlides - slidesPerView) ? 'none' : 'block';
        };

        nextButton.addEventListener('click', () => {
            if (currentIndex < (totalSlides - slidesPerView)) {
                currentIndex++;
                updateCarousel();
            }
        });

        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });

        // Initial setup and on window resize
        updateCarousel();
        window.addEventListener('resize', updateCarousel);
    }
});