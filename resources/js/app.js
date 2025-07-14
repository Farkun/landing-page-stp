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
    }
});