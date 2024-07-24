<H1 class="text-2xl font-bold text-green-800 text-center text-4xl">BAPPEDA OFFICE</H1>
<div class="flex items-center justify-center flex-container mt-10 mb-20 ">
    <div class="carousel w-2/3 h-96 relative shadow-2xl rounded-lg overflow-hidden">
        <div class="carousel-track flex transition-transform duration-700 ease-in-out">
            <div id="slide1" class="carousel-item w-full h-full flex-shrink-0 shadow-2xl shadow-black">
                <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp" class="w-full h-full object-cover" />
            </div>
            <div id="slide2" class="carousel-item w-full h-full flex-shrink-0">
                <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp" class="w-full h-full object-cover" />
            </div>
            <div id="slide3" class="carousel-item w-full h-full flex-shrink-0">
                <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.webp" class="w-full h-full object-cover" />
            </div>
            <div id="slide4" class="carousel-item w-full h-full flex-shrink-0">
                <img src="{{ asset('images/kantor.jpg') }}" class="w-full h-full object-cover" />
            </div>
        </div>
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide4" class="btn btn-circle prev">❮</a>
            <a href="#slide2" class="btn btn-circle next">❯</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentIndex = 0;
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;
        const slideWidth = slides[0].clientWidth;

        function updateSlidePosition() {
            track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlidePosition();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlidePosition();
        }

        document.querySelector('.next').addEventListener('click', nextSlide);
        document.querySelector('.prev').addEventListener('click', prevSlide);

        setInterval(nextSlide, 3000); // Change slide every 3 seconds
    });
</script>

<style>
    .carousel {
        width: 1000px; /* set your desired width */
        height: 400px; /* set your desired height */
    }

    .carousel-item img {
        width: 1000px; /* set the same width as the carousel */
        height: 400px; /* set the same height as the carousel */
    }
</style>
