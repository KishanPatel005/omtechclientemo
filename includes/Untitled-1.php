            <!--============ OMACTUO Hero Slider Start ============-->

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<style>
    .om-hero-slider-area {
        background: #fdfdfd;
        padding: 40px 0 60px;
        overflow: hidden;
        position: relative;
    }

    .om-3d-slider {
        width: 100%;
        height: 550px; /* Fixed height for Desktop */
        perspective: 1500px;
        overflow: visible !important;
    }

    .swiper-wrapper {
        transform-style: preserve-3d;
    }

    .om-3d-slide {
        width: 60% !important; /* Adjusted for better 20-5-50-5-20 balance */
        height: 100%;
        border-radius: 30px;
        transition: all 0.8s cubic-bezier(0.25, 1, 0.22, 1);
        position: relative;
        background: #eee; /* Fallback color */
    }

    .om-3d-slide img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
        display: block;
        border-radius: 30px;
    }

    /* --- CRITICAL MOBILE FIX --- */
    @media (max-width: 768px) {
        .om-3d-slider { 
            height: 350px !important; /* Forces height visibility */
            perspective: 800px; /* Lower perspective for small screens */
        }
        .om-3d-slide { 
            width: 80% !important; /* Makes image large enough to see */
            border-radius: 20px;
        }
        .om-3d-slide img {
            border-radius: 20px;
        }
        
        /* Softer 3D angles for mobile to prevent clipping */
        .om-3d-slide.swiper-slide-prev { 
            transform: translateX(10%) rotateY(15deg) scale(0.9) !important; 
        }
        .om-3d-slide.swiper-slide-next { 
            transform: translateX(-10%) rotateY(-15deg) scale(0.9) !important; 
        }

        /* Adjust navigation for mobile */
        .hero-nav-btn {
            width: 35px !important;
            height: 35px !important;
            top: auto !important;
            bottom: 10px !important;
        }
        .swiper-button-prev { left: 30% !important; }
        .swiper-button-next { right: 30% !important; }
    }

    /* --- Desktop 3D Positioning --- */
    .om-3d-slide.swiper-slide-prev {
        transform: translateX(18%) rotateY(35deg) scale(0.8);
        filter: brightness(0.6);
        z-index: 5;
    }

    .om-3d-slide.swiper-slide-next {
        transform: translateX(-18%) rotateY(-35deg) scale(0.8);
        filter: brightness(0.6);
        z-index: 5;
    }

    .om-3d-slide.swiper-slide-active {
        transform: translateX(0) rotateY(0deg) scale(1);
        filter: brightness(1);
        z-index: 10;
        box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    }

    /* Fixed Orange Circle Buttons */
    .hero-nav-btn {
        width: 50px; height: 50px;
        background: #FF5F1F !important;
        border-radius: 50%;
        display: flex !important;
        align-items: center; justify-content: center;
        color: #fff !important;
        z-index: 100;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }
    .hero-nav-btn i { font-size: 18px; color: white !important; }
    .hero-nav-btn::after { content: none; }
</style>
<div class="om-hero-slider-area">
    <div class="swiper om-3d-slider">
        <div class="swiper-wrapper">
            <?php 
            // Using your freelance business logic for Dynamic PHP
            $slider_query = mysqli_query($con, "SELECT * FROM sliders WHERE status = 'active' ORDER BY id DESC");
            if(mysqli_num_rows($slider_query) > 0):
                while($s = mysqli_fetch_assoc($slider_query)): 
            ?>
            <div class="swiper-slide om-3d-slide">
                <img src="<?php echo $s['image']; ?>" alt="Slide">
                <div class="om-slide-content" style="position:absolute; bottom:20px; left:20px; color:white; text-shadow: 1px 1px 5px #000;">
                    <h3><?php echo htmlspecialchars($s['headline']); ?></h3>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>

        <div class="swiper-button-prev hero-nav-btn"><i class="fas fa-chevron-left"></i></div>
        <div class="swiper-button-next hero-nav-btn"><i class="fas fa-chevron-right"></i></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.om-3d-slider', {
            slidesPerView: 'auto',
            centeredSlides: true,
            loop: true,
            speed: 1000,
            watchSlidesProgress: true,
            grabCursor: true,
            autoplay: { 
                delay: 1000, 
                disableOnInteraction: false 
            },
            navigation: { 
                nextEl: '.swiper-button-next', 
                prevEl: '.swiper-button-prev' 
            },
            pagination: { 
                el: '.swiper-pagination', 
                clickable: true,
                dynamicBullets: true 
            },
            on: {
                init: function() {
                    // Force a resize calculation to ensure images show
                    this.update();
                }
            }
        });
    });
</script>
            
            <!--============ OMACTUO Hero Slider End ============-->