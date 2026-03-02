<?php include 'includes/header.php'; ?>

<?php include 'includes/popup.php'; ?>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

        
                   <!--============ OMACTUO Hero Slider Start ============-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* --- HIDE ALL LEGACY HERO ELEMENTS --- */
    .infotechno-hero-area, .infotechno-hero-inner-images, .infotechno-hero-text, 
    .hero-main-slider, .infotechno-bg, #hero-main-slider {
        display: none !important;
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
        overflow: hidden !important;
    }

    /* --- OMACTUO PREMIUM 3D SLIDER --- */
    .om-hero-slider-area {
        background: #fdfdfd;
        padding: 40px 0 80px;
        overflow: hidden;
        position: relative;
    }

    .om-3d-slider {
        width: 100%;
        height: 580px;
        perspective: 1500px;
        perspective-origin: center;
        overflow: visible !important;
    }

    #om_v4_hero .swiper-wrapper {
        transform-style: preserve-3d;
        display: flex;
        transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    /* Math: Center(50%) + Gaps(5%x2) + Sides(20%x2) = 100% */
    .om-3d-slide {
        width: 50% !important; 
        height: 100%;
        border-radius: 40px;
        transition: all 1s cubic-bezier(0.165, 0.84, 0.44, 1);
        position: relative;
        overflow: hidden;
        /* No card-style background or shadow */
        transform-origin: center;
    }

    .om-3d-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 1.5s ease;
    }

    /* Side Slides: Pronounced 3D */
    .om-3d-slide.swiper-slide-prev {
        transform: rotateY(40deg) scale(0.85);
        filter: brightness(0.6) blur(2px);
        opacity: 0.8;
        z-index: 5;
    }

    .om-3d-slide.swiper-slide-next {
        transform: rotateY(-40deg) scale(0.85);
        filter: brightness(0.6) blur(2px);
        opacity: 0.8;
        z-index: 5;
    }

    /* Active Slide: Focus */
    .om-3d-slide.swiper-slide-active {
        transform: rotateY(0deg) scale(1); /* Locked scale for perfect centering */
        filter: brightness(1) blur(0);
        opacity: 1;
        z-index: 10;
    }

    .om-3d-slide.swiper-slide-active img {
        transform: scale(1.1);
    }

    /* Content Overlay */
    .om-slide-content {
        position: absolute;
        inset: 0;
        background: linear-gradient(0deg, rgba(11, 11, 69, 0.9) 0%, rgba(11, 11, 69, 0.3) 50%, transparent 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 60px 50px;
        color: white;
        opacity: 0;
        transform: translateY(30px);
        transition: 0.7s ease 0.4s;
    }

    .swiper-slide-active .om-slide-content {
        opacity: 1;
        transform: translateY(0);
    }

    .om-headline {
        font-size: clamp(26px, 4vw, 48px);
        font-weight: 900;
        margin-bottom: 20px;
        line-height: 1.1;
    }

    .om-btn {
        background: #FF5F1F;
        color: #fff !important;
        padding: 15px 35px;
        border-radius: 8px;
        font-weight: 800;
        text-transform: uppercase;
        width: fit-content;
        box-shadow: 0 10px 20px rgba(255, 95, 31, 0.4);
        transition: 0.3s;
    }

    .om-btn:hover { background: #fff; color: #FF5F1F !important; transform: translateY(-3px); }

    /* Nav UI */
    .hero-nav-btn {
        width: 55px; height: 55px;
        background: #FF5F1F !important;
        border-radius: 50%;
        color: #fff !important;
        z-index: 20;
    }
    .hero-nav-btn::after { content: none; }
    .hero-nav-btn i { font-size: 20px; }

    /* Mobile Adaptions */
    @media (max-width: 767px) {
        .om-hero-slider-area { padding: 5px 0 15px !important; }
        .om-3d-slider { 
            height: 150px !important; /* Extremely compact height for full wide view */
            overflow: visible !important; 
            perspective: 1500px !important;
        }
        .om-3d-slide { 
            width: 50% !important; 
            border-radius: 6px !important; 
        }

        /* Show full image without cropping */
        .om-3d-slide img {
            object-fit: fill !important; /* Squeezes whole image into the box */
        }

        /* Side Slides on Mobile: Pronounced 3D */
        .om-3d-slide.swiper-slide-prev {
            transform: rotateY(35deg) scale(0.8) !important;
            filter: brightness(0.6) !important;
        }
        .om-3d-slide.swiper-slide-next {
            transform: rotateY(-35deg) scale(0.8) !important;
            filter: brightness(0.6) !important;
        }
        .om-3d-slide.swiper-slide-active {
            transform: rotateY(0deg) scale(1) !important;
            filter: brightness(1) !important;
            /* Removed card shadow on mobile */
        }

        .om-slide-content { 
            padding: 10px !important; 
            display: flex !important;
            justify-content: flex-end !important;
        }
        .om-headline { font-size: 11px !important; margin-bottom: 5px !important; }
        .om-btn { 
            display: inline-block !important;
            padding: 4px 10px !important; 
            font-size: 9px !important; 
            border-radius: 4px !important;
        } 
        /* Properly within media query */
        .hero-nav-btn { 
            visibility: hidden !important; 
            opacity: 0.1 !important; 
            pointer-events: auto !important;
            display: flex !important;
            width: 1px !important; height: 1px !important; overflow: hidden !important;
        }
    }
/* --- OMACTUO PREMIUM 3D SLIDER --- */
.om-hero-slider-area {
    background: #fdfdfd;
    padding: 40px 0 80px;
    overflow: hidden;
    position: relative;
}

.om-3d-slider {
    width: 100%;
    height: 580px;
    perspective: 1200px; /* Adjusted perspective for better depth */
    overflow: visible !important;
}

/* Force the wrapper to allow slides to sit side-by-side correctly */
#om_v4_hero .swiper-wrapper {
    transform-style: preserve-3d;
    display: flex;
}

.om-3d-slide {
    width: 50% !important; /* The Active slide will be 50% */
    height: 100%;
    border-radius: 40px;
    transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), filter 0.8s, opacity 0.8s;
    position: relative;
    overflow: hidden;
}

/* Side Slides: Forced to 20% visual appearance via Scale */
/* Math: 0.4 of 50% = 20% of total width */
.om-3d-slide.swiper-slide-prev {
    transform: translateX(10%) rotateY(35deg) scale(0.6) !important; 
    filter: brightness(0.6) blur(2px);
    opacity: 0.7;
    z-index: 5;
}

.om-3d-slide.swiper-slide-next {
    transform: translateX(-10%) rotateY(-35deg) scale(0.6) !important;
    filter: brightness(0.6) blur(2px);
    opacity: 0.7;
    z-index: 5;
}

/* Active Slide: Focus (The 50% block) */
.om-3d-slide.swiper-slide-active {
    transform: rotateY(0deg) scale(1) !important;
    filter: brightness(1) blur(0);
    opacity: 1;
    z-index: 10;
}

/* Hide slides further out to keep the 3-slide focus */
.om-3d-slide:not(.swiper-slide-active):not(.swiper-slide-prev):not(.swiper-slide-next) {
    opacity: 0;
    visibility: hidden;
}
</style>

<section class="om-hero-slider-area">
    <div class="swiper om-3d-slider" id="om_v4_hero">
        <div class="swiper-wrapper">
            <?php 
            $res = mysqli_query($con, "SELECT * FROM sliders WHERE status = 'active' ORDER BY id DESC");
            if($res && mysqli_num_rows($res) > 0):
                $rows = [];
                while($row = mysqli_fetch_assoc($res)) { $rows[] = $row; }
                
                // Triple exactly for a robust 3-slide visible system (3x3 = 9 slides)
                $final_rows = array_merge($rows, $rows, $rows); 
                
                foreach($final_rows as $s): 
            ?>
            <div class="swiper-slide om-3d-slide">
                <img src="<?php echo $s['image']; ?>" alt="Slide" onerror="this.src='assets/images/hero/hero-01.webp'">
                <div class="om-slide-content">
                    <h2 class="om-headline"><?php echo htmlspecialchars($s['headline']); ?></h2>
                    <a href="<?php echo $s['button_link']; ?>" class="om-btn">View Details</a>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="swiper-slide om-3d-slide">
                <img src="assets/images/hero/hero-01.webp" alt="Default">
                <div class="om-slide-content">
                    <h2 class="om-headline">Advanced Industrial Solutions</h2>
                    <a href="products.php" class="om-btn">Explore Now</a>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="swiper-button-prev hero-nav-btn"><i class="fas fa-chevron-left"></i></div>
        <div class="swiper-button-next hero-nav-btn"><i class="fas fa-chevron-right"></i></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    (function() {
        if (window.OM_HERO_LOADED) return;
        window.OM_HERO_LOADED = true;

        // Capture V11 immediately before legacy scripts overwrite it
        var SwiperV11 = window.Swiper;

        function start_om_hero() {
            var el = document.getElementById('om_v4_hero');
            if (!el || typeof SwiperV11 === 'undefined') {
                setTimeout(start_om_hero, 250);
                return;
            }

            // Cleanup any ghost instances
            if (el.swiper) el.swiper.destroy(true, true);

            window.om_instance_v11 = new SwiperV11('#om_v4_hero', {
                slidesPerView: 'auto',
                centeredSlides: true,
                loop: true,
                loopedSlides: 6, 
                loopAdditionalSlides: 2,
                watchSlidesProgress: true,
                grabCursor: true,
                speed: 1000,
                spaceBetween: el.clientWidth * 0.05,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: { 
                    nextEl: '#om_v4_hero .swiper-button-next', 
                    prevEl: '#om_v4_hero .swiper-button-prev' 
                },
                pagination: { 
                    el: '#om_v4_hero .swiper-pagination', 
                    clickable: true 
                },
                on: {
                    init: function() {
                        var sw = this;
                        setTimeout(function() { sw.update(); }, 200);
                    },
                    slideChangeTransitionEnd: function() {
                        this.update(); // Re-center strictly after every scroll
                    },
                    resize: function() {
                        this.params.spaceBetween = this.el.clientWidth * 0.05;
                        this.update();
                    }
                }
            });

            // Prevent double-jumps by checking animation state
            setInterval(function() {
                var inst = window.om_instance_v11;
                if (!inst || inst.animating || !inst.initialized) return; 
                
                var n = document.querySelector('#om_v4_hero .swiper-button-next');
                if (n) n.click();
            }, 4000);

            console.log("3D Slider & Isolated Auto-Scroll Active");
        }

        if (document.readyState === 'complete') start_om_hero();
        else window.addEventListener('load', start_om_hero);
    })();
</script>
            
            <!--============ OMACTUO Hero Slider End ============-->

         <!--===========  feature-large-images-wrapper  Start =============-->
                <div class="feature-large-images-wrapper section-space--pt_100">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- section-title-wrap Start -->
                                <div class="section-title-wrap text-center section-space--mb_30">
                                    <h6 class="section-sub-title mb-20">Our Products</h6>
                                    <h3 class="heading">Discover our <span class="text-color-primary"> premium automation solutions</span></h3>
                                </div>
                                <!-- section-title-wrap Start -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mobile-product-grid-wrapper">

                                <style>
                                /* Strict 2x2 grid for mobile ONLY */
                                @media (max-width: 767px) {
                                    .mobile-product-grid-wrapper .row--35 {
                                        display: grid !important;
                                        grid-template-columns: repeat(2, 1fr) !important;
                                        gap: 12px !important;
                                        margin-left: 0 !important;
                                        margin-right: 0 !important;
                                    }
                                    .mobile-product-grid-wrapper .col-lg-4, 
                                    .mobile-product-grid-wrapper .mobile-explore-col {
                                        padding-left: 0 !important;
                                        padding-right: 0 !important;
                                        margin-top: 0 !important;
                                        width: 100% !important;
                                        max-width: 100% !important;
                                    }
                                    
                                    /* Force squares */
                                    .mobile-product-grid-wrapper .box-large-image__wrap,
                                    .mobile-product-grid-wrapper .box-large-image__box,
                                    .mobile-product-grid-wrapper .box-large-image__midea,
                                    .mobile-product-grid-wrapper .images-midea {
                                        height: 100% !important;
                                        border-radius: 8px; /* Smooth corners for tiles */
                                        overflow: hidden;
                                    }
                                    
                                    .mobile-product-grid-wrapper .images-midea {
                                        position: relative !important;
                                    }
                                    
                                    .mobile-product-grid-wrapper .images-midea img {
                                        height: 100% !important;
                                        width: 100% !important;
                                        aspect-ratio: 1 / 1 !important;
                                        object-fit: cover !important;
                                    }
                                    
                                    /* Align heading to bottom-center of the tile */
                                    .mobile-product-grid-wrapper .heading-wrap {
                                        padding: 12px 6px 8px !important;
                                        position: absolute !important;
                                        bottom: 0 !important;
                                        left: 0 !important;
                                        width: 100% !important;
                                        text-align: center !important;
                                        background: linear-gradient(to top, rgba(0,0,0,0.85), rgba(0,0,0,0)) !important;
                                        z-index: 2 !important;
                                    }
                                    
                                    .mobile-product-grid-wrapper .heading-wrap .heading {
                                        font-size: 13px !important;
                                        line-height: 1.3;
                                        margin: 0;
                                        color: #ffffff !important;
                                    }
                                    
                                    .mobile-product-grid-wrapper .button-wrapper {
                                        display: none !important; /* Hide view category btn to make room for 2x2 compactness */
                                    }

                                    /* 4th tile formatting */
                                    .mobile-explore-tile {
                                        display: flex !important;
                                        flex-direction: column;
                                        justify-content: center;
                                        align-items: center;
                                        height: 100% !important;
                                        aspect-ratio: 1 / 1 !important;
                                        
                                        border-radius: 8px;
                                        padding: 10px;
                                        text-align: center;
                                        text-decoration: none !important;
                                        transition: background-color 0.3s ease;
                                    }
                                    .mobile-explore-tile span {
                                        color: #0B0B45;
                                        font-size: 13px;
                                        font-weight: 700;
                                        line-height: 1.4;
                                        margin-bottom: 8px;
                                    }
                                    .mobile-explore-tile i {
                                        color: #FF5F1F;
                                        font-size: 20px;
                                    }
                                    .mobile-explore-tile:hover {
                                        background-color: #FF5F1F;
                                    }
                                    .mobile-explore-tile:hover span {
                                        color: #ffffff;
                                    }
                                    .mobile-explore-tile:hover i {
                                        color: #ffffff;
                                    }
                                }
                                </style>

                                <div class="row row--35">
                                    <?php 
                                    $cat_query = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' AND show_on_home = 'yes' ORDER BY priority ASC, category_name ASC");
                                    $cat_count = 0;
                                    while($cat = mysqli_fetch_assoc($cat_query)):
                                        $cat_count++;
                                        /* Show only first 3 on ALL screen sizes */
                                        if ($cat_count > 3) break;
                                    ?>
                                    <div class="col-lg-4 col-md-6 mt-30">
                                        <!-- Box large image wrap Start -->
                                        <a href="products.php?category=<?php echo urlencode($cat['category_name']); ?>" class="box-large-image__wrap wow move-up">
                                            <div class="box-large-image__box">
                                                <div class="box-large-image__midea">
                                                    <div class="images-midea">
                                                        <img src="<?php echo !empty($cat['category_image']) ? $cat['category_image'] : 'assets/images/box-image/blog-01-330x330.webp'; ?>" width="330" height="330" class="img-fluid" alt="<?php echo htmlspecialchars($cat['category_name']); ?>" style="height: 330px; object-fit: cover;">

                                                        <div class="button-wrapper">
                                                            <div class="btn tm-button">
                                                                <span class="button-text">View Category</span>
                                                            </div>
                                                        </div>
                                                        <div class="heading-wrap">
                                                            <h5 class="heading"><?php echo htmlspecialchars($cat['category_name']); ?></h5>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Box large image wrap End -->
                                    </div>
                                    <?php endwhile; ?>

                                    <!-- The 4th Tile (Mobile Only) -->
                                    <div class="mobile-explore-col d-block d-md-none">
                                        <a href="products.php" class="mobile-explore-tile wow move-up">
                                            <span>Explore Our Complete Product Catalog</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Desktop CTA Button (Desktop Only) -->
                                <div class="text-center section-space--mt_40 d-none d-md-block">
                                    <a href="products.php" class="btn-explore-catalog">
                                        Explore Our Complete Product Catalog
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                                <style>
                                    .btn-explore-catalog {
                                        display: inline-flex;
                                        align-items: center;
                                        gap: 8px;
                                        padding: 14px 36px;
                                        background: #0B0B45;
                                        color: #fff !important;
                                        font-size: 15px;
                                        font-weight: 700;
                                        text-transform: uppercase;
                                        letter-spacing: 0.8px;
                                        border-radius: 6px;
                                        text-decoration: none !important;
                                        border: 2px solid #0B0B45;
                                        transition: background 0.3s ease, color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
                                        box-shadow: 0 4px 18px rgba(11,11,69,0.18);
                                    }
                                    .btn-explore-catalog:hover {
                                        background: #FF5F1F;
                                        border-color: #FF5F1F;
                                        color: #fff !important;
                                        transform: translateY(-3px);
                                        box-shadow: 0 8px 28px rgba(255,95,31,0.28);
                                    }
                                    .btn-explore-catalog i {
                                        transition: transform 0.3s ease;
                                    }
                                    .btn-explore-catalog:hover i {
                                        transform: translateX(5px);
                                    }
                                </style>

                            </div>
                        </div>
                    </div>
                </div>
                <!--===========  feature-large-images-wrapper  End =============-->




            <!--===========  Engineering & Automation Solutions  Start =============-->
            <div class="om-eng-section" style="margin-top: 60px;">

                <style>
                /* ─── Section Shell: Blueprint Background ─────────────────── */
                .om-eng-section {
                    position: relative;
                    padding: 100px 0;
                    overflow: hidden;
                    /* Soft radial centre-light on a warm-off-white base */
                    background:
                        radial-gradient(ellipse 80% 60% at 50% 0%, rgba(255,95,31,0.045) 0%, transparent 70%),
                        radial-gradient(ellipse 60% 80% at 90% 100%, rgba(11,11,69,0.04) 0%, transparent 65%),
                        #f6f7fb;
                }
                /* ─── Base dot grid (slightly more visible) ─────────────── */
                .om-eng-section::before {
                    content: '';
                    position: absolute;
                    inset: 0;
                    background-image:
                        radial-gradient(circle, rgba(11,11,69,0.18) 1.5px, transparent 1.5px);
                    background-size: 28px 28px;
                    pointer-events: none;
                    z-index: 0;
                }

                /* ─── Orange cursor-spotlight dot layer ──────────────────── */
                /* Identical grid, orange dots — masked to only show near cursor */
                .om-eng-section::after {
                    content: '';
                    position: absolute;
                    inset: 0;
                    background-image:
                        radial-gradient(circle, rgba(255,95,31,0.90) 1.5px, transparent 1.5px);
                    background-size: 28px 28px;
                    pointer-events: none;
                    z-index: 0;
                    /* Mask: only reveal dots within ~300px of the cursor.
                       --om-mx/--om-my are updated by JS. Default at -9999px hides all. */
                    -webkit-mask-image: radial-gradient(
                        circle 300px at var(--om-mx, -9999px) var(--om-my, -9999px),
                        black 0%,
                        black 25%,
                        transparent 75%
                    );
                    mask-image: radial-gradient(
                        circle 300px at var(--om-mx, -9999px) var(--om-my, -9999px),
                        black 0%,
                        black 25%,
                        transparent 75%
                    );
                }
                /* Disable the orange spotlight layer on mobile/touch */
                @media (max-width: 991px) {
                    .om-eng-section::after {
                        display: none;
                    }
                }

                .om-eng-section > .container {
                    position: relative;
                    z-index: 1;
                }

                /* ─── Section Heading ─────────────────────────────────────── */
                .om-eng-label {
                    display: inline-block;
                    font-size: 11px;
                    font-weight: 800;
                    letter-spacing: 3px;
                    text-transform: uppercase;
                    color: #FF5F1F;
                    background: rgba(255,95,31,0.08);
                    border: 1px solid rgba(255,95,31,0.22);
                    padding: 5px 18px;
                    border-radius: 30px;
                    margin-bottom: 22px;
                }
                .om-eng-title {
                    font-size: clamp(22px, 3.4vw, 34px);
                    font-weight: 800;
                    letter-spacing: -0.5px;
                    line-height: 1.25;
                    color: #0B0B45;
                    margin: 0 auto 10px;
                    max-width: 720px;
                }
                .om-eng-title .om-accent {
                    color: #FF5F1F;
                }
                .om-eng-tagline {
                    font-size: 15px;
                    color: #6b7280;
                    max-width: 540px;
                    margin: 0 auto 56px;
                    line-height: 1.7;
                }

                /* ─── Card Grid ──────────────────────────────────────────── */
                .om-eng-grid {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 28px;
                    align-items: stretch;
                }
                @media (max-width: 991px) {
                    .om-eng-grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }
                @media (max-width: 575px) {
                    .om-eng-grid {
                        grid-template-columns: 1fr;
                        gap: 20px;
                    }
                    .om-eng-title {
                        font-size: 24px;
                    }
                }

                /* ─── Premium Floating Card ──────────────────────────────── */
                .om-prem-card {
                    background: #ffffff;
                    border-radius: 16px;
                    padding: 44px 32px 36px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    /* Subtle lift shadow */
                    box-shadow: 0 10px 30px rgba(0,0,0,0.05), 0 1px 4px rgba(0,0,0,0.04);
                    /* Invisible border that glows on hover */
                    border: 1.5px solid transparent;
                    transition:
                        transform 0.3s ease,
                        box-shadow 0.3s ease,
                        border-color 0.3s ease;
                    /* Enables the subtle top-line accent */
                    position: relative;
                    overflow: hidden;
                }
                /* Thin orange top-accent line */
                .om-prem-card::after {
                    content: '';
                    position: absolute;
                    top: 0; left: 50%;
                    transform: translateX(-50%) scaleX(0);
                    width: 60%;
                    height: 3px;
                    background: linear-gradient(90deg, transparent, #FF5F1F, transparent);
                    border-radius: 0 0 4px 4px;
                    transition: transform 0.35s ease;
                }

                /* ─── Hover State ────────────────────────────────────────── */
                .om-prem-card:hover {
                    transform: translateY(-7px);
                    border-color: rgba(255, 95, 31, 0.35);
                    box-shadow:
                        0 20px 50px rgba(255,95,31,0.12),
                        0 6px 18px rgba(0,0,0,0.07),
                        0 0 0 1px rgba(255,95,31,0.12);
                }
                .om-prem-card:hover::after {
                    transform: translateX(-50%) scaleX(1);
                }

                /* ─── Icon Bubble ────────────────────────────────────────── */
                .om-icon-bubble {
                    width: 82px;
                    height: 82px;
                    border-radius: 50%;
                    background: linear-gradient(145deg, rgba(255,95,31,0.10) 0%, rgba(255,95,31,0.04) 100%);
                    border: 1.5px solid rgba(255,95,31,0.18);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 26px;
                    transition: transform 0.3s ease, background 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
                }
                .om-icon-bubble i {
                    font-size: 34px;
                    color: #FF5F1F;
                    transition: transform 0.3s ease;
                }
                .om-prem-card:hover .om-icon-bubble {
                    background: linear-gradient(145deg, rgba(255,95,31,0.18) 0%, rgba(255,95,31,0.08) 100%);
                    border-color: rgba(255,95,31,0.45);
                    box-shadow: 0 0 20px rgba(255,95,31,0.20);
                }
                .om-prem-card:hover .om-icon-bubble i {
                    transform: scale(1.15);
                }

                /* ─── Card Text ──────────────────────────────────────────── */
                .om-prem-card__title {
                    font-size: 18px;
                    font-weight: 800;
                    color: #0B0B45;
                    letter-spacing: -0.2px;
                    margin-bottom: 14px;
                    line-height: 1.3;
                }
                .om-prem-card__body {
                    font-size: 14.5px;
                    color: #6b7280;
                    line-height: 1.8;
                    flex-grow: 1;
                }

                /* ─── Arrow CTA ──────────────────────────────────────────── */
                .om-arrow-btn {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 44px;
                    height: 44px;
                    border-radius: 50%;
                    border: 2px solid rgba(255,95,31,0.4);
                    color: #FF5F1F !important;
                    font-size: 15px;
                    text-decoration: none;
                    margin-top: 28px;
                    transition: background 0.25s ease, border-color 0.25s ease, color 0.25s ease, transform 0.25s ease;
                }
                .om-arrow-btn:hover {
                    background: #FF5F1F;
                    border-color: #FF5F1F;
                    color: #fff !important;
                    transform: scale(1.10);
                }

                /* ─── CTA Button ─────────────────────────────────────────── */
                .om-eng-cta {
                    margin-top: 56px;
                    text-align: center;
                }
                .om-eng-cta-btn {
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                    padding: 15px 40px;
                    background: #FF5F1F;
                    color: #fff !important;
                    font-size: 14px;
                    font-weight: 800;
                    letter-spacing: 1.2px;
                    text-transform: uppercase;
                    text-decoration: none !important;
                    border-radius: 8px;
                    box-shadow: 0 6px 24px rgba(255,95,31,0.30);
                    border: 2px solid #FF5F1F;
                    transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
                }
                .om-eng-cta-btn:hover {
                    background: #e8511a;
                    box-shadow: 0 12px 36px rgba(255,95,31,0.40);
                    transform: translateY(-2px);
                }
                .om-eng-cta-btn i {
                    transition: transform 0.3s ease;
                }
                .om-eng-cta-btn:hover i {
                    transform: translateX(5px);
                }

                /* ─── Scroll-Entrance: cards start hidden, JS adds .om-card-visible ──── */
                .om-prem-card {
                    opacity: 0;
                    transform: translateY(32px);
                    /* Existing transitions are already on the element; add opacity here */
                    transition:
                        opacity 0.55s ease,
                        transform 0.55s cubic-bezier(0.22, 1, 0.36, 1),
                        box-shadow 0.3s ease,
                        border-color 0.3s ease;
                }
                .om-prem-card.om-card-visible {
                    opacity: 1;
                    transform: translateY(0);
                }
                /* Re-apply hover lift only after visible */
                .om-prem-card.om-card-visible:hover {
                    transform: translateY(-7px);
                }

                /* ─── Cursor Spotlight layer inside each card ────────────────── */
                .om-card-spotlight {
                    position: absolute;
                    inset: 0;
                    border-radius: 16px;
                    pointer-events: none;
                    z-index: 0;
                    opacity: 0;
                    background: radial-gradient(
                        350px circle at 50% 50%,
                        rgba(255,95,31,0.07) 0%,
                        transparent 70%
                    );
                    transition: opacity 0.3s ease;
                }
                .om-prem-card:hover .om-card-spotlight {
                    opacity: 1;
                }
                /* Ensure card children sit above the spotlight */
                .om-prem-card > *:not(.om-card-spotlight) {
                    position: relative;
                    z-index: 1;
                }

                /* ─── Icon Keyframe: Card 1 — Robot bobs up/down ─────────────── */
                @keyframes om-robot-bob {
                    0%, 100% { transform: translateY(0px);   }
                    40%       { transform: translateY(-4px);  }
                    70%       { transform: translateY(-2px);  }
                }
                .om-prem-card[data-om-card="1"]:hover .om-icon-bubble i {
                    transform: none !important; /* override the generic scale */
                    animation: om-robot-bob 1.4s ease-in-out infinite;
                }

                /* ─── Icon Keyframe: Card 2 — Chip shine sweep ───────────────── */
                @keyframes om-chip-shine {
                    0%   { text-shadow: none; filter: brightness(1); }
                    30%  { filter: brightness(1.5) drop-shadow(0 0 6px rgba(255,95,31,0.65)); }
                    60%  { filter: brightness(1.1) drop-shadow(0 0 2px rgba(255,95,31,0.25)); }
                    100% { text-shadow: none; filter: brightness(1); }
                }
                .om-prem-card[data-om-card="2"]:hover .om-icon-bubble i {
                    transform: none !important;
                    animation: om-chip-shine 1.6s ease-in-out infinite;
                }

                /* ─── Icon Keyframe: Card 3 — Gears rotate ──────────────────── */
                /* fa-cogs renders as a single glyph — we animate the whole icon */
                @keyframes om-gear-spin {
                    0%   { transform: rotate(0deg);   }
                    100% { transform: rotate(360deg); }
                }
                /* We use a pseudo trick: glyph spin on hover */
                .om-prem-card[data-om-card="3"]:hover .om-icon-bubble i {
                    transform: none !important;
                    animation: om-gear-spin 2.8s linear infinite;
                    display: inline-block; /* required for transform on inline icons */
                }
                </style>

                <div class="container">

                    <!-- Section Header -->
                    <div class="text-center">
                        <span class="om-eng-label">Engineering &amp; Automation Solutions</span>
                        <h2 class="om-eng-title">
                            For your specific industrial challenges,<br>
                            <span class="om-accent">OM TECHNOMATION</span> builds<br>
                            highly-tailored automated systems.
                        </h2>
                        
                    </div>

                    <!-- Service Cards -->
                    <div class="om-eng-grid">

                        <!-- Card 1: Automation & Robotics -->
                        <div class="om-prem-card" data-om-card="1">
                            <div class="om-card-spotlight" aria-hidden="true"></div>
                            <div class="om-icon-bubble">
                                <i class="fas fa-robot"></i>
                            </div>
                            <h3 class="om-prem-card__title">Automation &amp; Robotics</h3>
                            <p class="om-prem-card__body">
                                Design and implementation of automated systems to improve productivity,
                                precision, and operational efficiency. Includes robotic integration,
                                motion control, and custom automation cells.
                            </p>
                            <a href="services.php" class="om-arrow-btn" aria-label="Learn about Automation &amp; Robotics">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Card 2: Product Development & R&D -->
                        <div class="om-prem-card" data-om-card="2">
                            <div class="om-card-spotlight" aria-hidden="true"></div>
                            <div class="om-icon-bubble">
                                <i class="fas fa-microchip"></i>
                            </div>
                            <h3 class="om-prem-card__title">Product Development &amp; R&amp;D</h3>
                            <p class="om-prem-card__body">
                                End-to-end product engineering — from concept and feasibility to design,
                                prototyping, testing, and production support. Focused on manufacturable
                                and scalable solutions.
                            </p>
                            <a href="services.php" class="om-arrow-btn" aria-label="Learn about Product Development">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                        <!-- Card 3: Special Purpose Machines -->
                        <div class="om-prem-card" data-om-card="3">
                            <div class="om-card-spotlight" aria-hidden="true"></div>
                            <div class="om-icon-bubble">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <h3 class="om-prem-card__title">Special Purpose Machines</h3>
                            <p class="om-prem-card__body">
                                Custom-designed machines built for specific industrial tasks where standard
                                equipment fails. Engineered for reliability, repeatability, and
                                high throughput.
                            </p>
                            <a href="services.php" class="om-arrow-btn" aria-label="Learn about Special Purpose Machines">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                    </div><!-- /.om-eng-grid -->

                    <!-- Bottom CTA -->
                    <div class="om-eng-cta">
                        <a href="services.php" class="om-eng-cta-btn">
                            View All Services
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                </div><!-- /.container -->
            </div>
            <!--===========  Engineering & Automation Solutions  End =============-->

            <script>
            (function () {
                'use strict';

                /* ═══════════════════════════════════════════════════════════════
                 *  1. STAGGERED SCROLL ENTRANCE — Intersection Observer
                 *  Cards start at opacity:0 / translateY(32px) via CSS.
                 *  Once the grid enters the viewport, cards cascade in.
                 * ══════════════════════════════════════════════════════════════ */
                var cards = document.querySelectorAll('.om-prem-card');

                if ('IntersectionObserver' in window) {
                    var obsOptions = { threshold: 0.12 };
                    var obs = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (!entry.isIntersecting) return;
                            var grid = entry.target;
                            var gridCards = grid.querySelectorAll('.om-prem-card');
                            gridCards.forEach(function (card, i) {
                                /* Cascade: 0ms, 150ms, 300ms */
                                setTimeout(function () {
                                    card.classList.add('om-card-visible');
                                }, i * 150);
                            });
                            obs.unobserve(grid); /* fire once */
                        });
                    }, obsOptions);

                    var grid = document.querySelector('.om-eng-grid');
                    if (grid) obs.observe(grid);
                } else {
                    /* Fallback: reveal immediately if IO not supported */
                    cards.forEach(function (c) { c.classList.add('om-card-visible'); });
                }

                /* ═══════════════════════════════════════════════════════════════
                 *  2. CURSOR SPOTLIGHT — follows mouse inside each card
                 *  Skips touch devices (hover media query check).
                 *  Uses requestAnimationFrame for silky-smooth updates.
                 * ══════════════════════════════════════════════════════════════ */
                var isTouchDevice = window.matchMedia('(hover: none)').matches;
                if (!isTouchDevice) {
                    cards.forEach(function (card) {
                        var spotlight = card.querySelector('.om-card-spotlight');
                        if (!spotlight) return;

                        var rafId = null;
                        var mouseX = 0, mouseY = 0;

                        function updateSpotlight() {
                            var rect   = card.getBoundingClientRect();
                            var relX   = mouseX - rect.left;
                            var relY   = mouseY - rect.top;
                            /* Express as percentages so it works at any card size */
                            var pctX   = (relX / rect.width)  * 100;
                            var pctY   = (relY / rect.height) * 100;

                            spotlight.style.background =
                                'radial-gradient(' +
                                    '320px circle at ' + pctX + '% ' + pctY + '%, ' +
                                    'rgba(255,95,31,0.09) 0%, ' +
                                    'transparent 75%' +
                                ')';

                            /* Also nudge the border glow toward the cursor */
                            var edgeR = Math.max(0, (pctX - 50) / 50); /* -1..1 */
                            var edgeB = Math.max(0, (pctY - 50) / 50);
                            var edgeL = Math.max(0, (50 - pctX) / 50);
                            var edgeT = Math.max(0, (50 - pctY) / 50);
                            card.style.boxShadow =
                                'inset 0 0 0 1.5px rgba(255,95,31,' +
                                    (Math.max(edgeR, edgeB, edgeL, edgeT) * 0.25) +
                                '), ' +
                                '0 20px 50px rgba(255,95,31,0.10), ' +
                                '0 6px 18px rgba(0,0,0,0.06)';

                            rafId = null;
                        }

                        card.addEventListener('mousemove', function (e) {
                            mouseX = e.clientX;
                            mouseY = e.clientY;
                            if (!rafId) rafId = requestAnimationFrame(updateSpotlight);
                        });

                        card.addEventListener('mouseleave', function () {
                            /* Reset spotlight and box-shadow on leave */
                            spotlight.style.background = '';
                            card.style.boxShadow = '';
                            if (rafId) {
                                cancelAnimationFrame(rafId);
                                rafId = null;
                            }
                        });
                    });
                }

                /* ═══════════════════════════════════════════════════════════════
                 *  3. DOT-GRID CURSOR SPOTLIGHT — tracks mouse over the section
                 *  Updates CSS custom props --om-mx / --om-my on the section el.
                 *  The ::after pseudo-element's mask-image follows these values.
                 *  Skipped entirely on touch / narrow screens (≤991px).
                 * ══════════════════════════════════════════════════════════════ */
                var isDesktop = window.matchMedia('(min-width: 992px) and (hover: hover)').matches;
                if (isDesktop) {
                    var engSection = document.querySelector('.om-eng-section');
                    if (engSection) {
                        var gridRafId = null;
                        var gridMx = -9999, gridMy = -9999;

                        function applyGridSpotlight() {
                            engSection.style.setProperty('--om-mx', gridMx + 'px');
                            engSection.style.setProperty('--om-my', gridMy + 'px');
                            gridRafId = null;
                        }

                        engSection.addEventListener('mousemove', function (e) {
                            var rect = engSection.getBoundingClientRect();
                            gridMx = e.clientX - rect.left;
                            gridMy = e.clientY - rect.top;
                            if (!gridRafId) {
                                gridRafId = requestAnimationFrame(applyGridSpotlight);
                            }
                        });

                        engSection.addEventListener('mouseleave', function () {
                            /* Push cursor off-screen so the mask hides all dots */
                            gridMx = -9999; gridMy = -9999;
                            engSection.style.setProperty('--om-mx', '-9999px');
                            engSection.style.setProperty('--om-my', '-9999px');
                            if (gridRafId) {
                                cancelAnimationFrame(gridRafId);
                                gridRafId = null;
                            }
                        });
                    }
                }
            })();
            </script>






            <!--====================  testimonial section ====================-->
            <!--====================  testimonial section Start ====================-->
            <div class="testimonial-slider-area section-space--ptb_120" style="background-color: #ffffff;">
                <style>
                    /* ─── Equal-height Swiper alignment ───────────────────────────── */
                    .testimonial-slider__container .swiper-wrapper {
                        align-items: stretch;
                    }
                    .testimonial-slider__container .swiper-slide {
                        height: auto !important;
                    }

                    /* ─── Premium Floating Card ───────────────────────────────── */
                    .om-testi-card {
                        position: relative;
                        background: #ffffff;
                        border-radius: 16px;
                        padding: 36px 32px 30px;
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                        box-shadow: 0 15px 35px rgba(0,0,0,0.06), 0 2px 8px rgba(0,0,0,0.04);
                        border: 1px solid rgba(0,0,0,0.04);
                        /* Smooth hover lift */
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        overflow: hidden;
                    }
                    .om-testi-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 24px 50px rgba(0,0,0,0.09), 0 4px 12px rgba(0,0,0,0.05);
                    }

                    /* Oversized decorative quotation mark watermark */
                    .om-testi-card::before {
                        content: '\201C';
                        position: absolute;
                        top: -10px;
                        right: 20px;
                        font-size: 140px;
                        font-family: Georgia, serif;
                        font-weight: 900;
                        line-height: 1;
                        color: rgba(255,95,31,0.07);
                        pointer-events: none;
                        user-select: none;
                        z-index: 0;
                    }
                    .om-testi-card > * {
                        position: relative;
                        z-index: 1;
                    }

                    /* ─── Stars ──────────────────────────────────────────────── */
                    .om-testi-stars {
                        display: flex;
                        gap: 3px;
                        margin-bottom: 14px;
                    }
                    .om-testi-stars i {
                        font-size: 14px;
                        color: #FF5F1F;   /* brand orange — not yellow */
                    }
                    .om-testi-stars i.far {
                        color: rgba(255,95,31,0.25);
                    }

                    /* ─── Subject line ───────────────────────────────────────── */
                    .om-testi-subject {
                        font-size: 16px;
                        font-weight: 700;
                        color: #0B0B45;
                        margin-bottom: 12px;
                        line-height: 1.4;
                    }

                    /* ─── Body text ─────────────────────────────────────────── */
                    .om-testi-body {
                        font-size: 14.5px;
                        color: #555e6d;
                        line-height: 1.78;
                        flex-grow: 1;
                    }

                    /* ─── Author area ───────────────────────────────────────── */
                    .om-testi-author {
                        display: flex;
                        align-items: center;
                        gap: 14px;
                        margin-top: 24px;
                        padding-top: 20px;
                        border-top: 1px solid rgba(0,0,0,0.07);
                    }
                    .om-testi-avatar {
                        width: 52px;
                        height: 52px;
                        border-radius: 50%;
                        object-fit: cover;
                        border: 2px solid rgba(255,95,31,0.20);
                        flex-shrink: 0;
                    }
                    .om-testi-name {
                        font-size: 14px;
                        font-weight: 700;
                        color: #0B0B45;
                        margin: 0 0 2px;
                        line-height: 1.3;
                    }
                    .om-testi-desig {
                        font-size: 12.5px;
                        color: #FF5F1F;
                        font-weight: 600;
                        margin: 0;
                        letter-spacing: 0.3px;
                    }

                    /* ─── Pagination dots ───────────────────────────────────── */
                    .testimonial-slider-area .swiper-pagination {
                        position: relative;
                        margin-top: 36px;
                    }
                    .testimonial-slider-area .swiper-pagination-bullet {
                        background: #0B0B45;
                        opacity: 0.2;
                        width: 7px;
                        height: 7px;
                        transition: transform 0.2s ease, opacity 0.2s ease;
                    }
                    .testimonial-slider-area .swiper-pagination-bullet-active {
                        background: #FF5F1F;
                        opacity: 1;
                        transform: scale(1.35);
                    }

                    /* ─── Mobile tweaks ──────────────────────────────────────── */
                    @media (max-width: 575px) {
                        .om-testi-card {
                            padding: 28px 22px 24px;
                        }
                        .om-testi-card::before {
                            font-size: 110px;
                        }
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20">Testimonials</h6>
    <h3 class="heading">What our clients say about <span class="text-color-primary">our solutions</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonial-slider">
                                <div class="swiper-container testimonial-slider__container">
                                    <div class="swiper-wrapper">
                                        <?php
                                        $testi_res = mysqli_query($con, "SELECT * FROM testimonials WHERE status = 'active' ORDER BY id DESC");
                                        if(mysqli_num_rows($testi_res) > 0):
                                            while($testi = mysqli_fetch_assoc($testi_res)):
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="om-testi-card">

                                                <!-- Stars -->
                                                <div class="om-testi-stars">
                                                    <?php
                                                    $rating = (int)$testi['rating'];
                                                    for($i=1; $i<=5; $i++) {
                                                        echo ($i <= $rating)
                                                            ? '<i class="fas fa-star"></i>'
                                                            : '<i class="far fa-star"></i>';
                                                    }
                                                    ?>
                                                </div>

                                                <!-- Subject -->
                                                <p class="om-testi-subject"><?php echo htmlspecialchars($testi['subject']); ?></p>

                                                <!-- Review text -->
                                                <p class="om-testi-body"><?php echo htmlspecialchars($testi['content']); ?></p>

                                                <!-- Author -->
                                                <div class="om-testi-author">
                                                    <img
                                                        src="<?php echo !empty($testi['image']) ? htmlspecialchars($testi['image']) : 'assets/images/testimonial/omactuo-testimonial-avata-04-70x70.webp'; ?>"
                                                        alt="<?php echo htmlspecialchars($testi['name']); ?>"
                                                        class="om-testi-avatar"
                                                    >
                                                    <div>
                                                        <p class="om-testi-name"><?php echo htmlspecialchars($testi['name']); ?></p>
                                                        <p class="om-testi-desig"><?php echo htmlspecialchars($testi['designation']); ?></p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                            endwhile;
                                        else:
                                        ?>
                                        <!-- No testimonials fallback -->
                                        <?php endif; ?>
                                    </div>
                                    <!-- Pagination dots -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====================  End of testimonial section  ====================-->

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper('.testimonial-slider__container', {
                    /* Default (desktop ≥ 1024px): 3 cards */
                    slidesPerView: 3,
                    spaceBetween : 30,
                    loop         : true,
                    speed        : 700,
                    autoplay     : { delay: 3000, disableOnInteraction: false },
                    /* Swiper v4 breakpoints = max-width thresholds (override downward) */
                    breakpoints: {
                        1023: { slidesPerView: 2, spaceBetween: 20 },  /* tablet  */
                        767 : { slidesPerView: 1, spaceBetween: 15 }   /* mobile  */
                    }
                });
            });
            </script>

            <!--====================  Blog Section Start ====================-->
            <div class="blog-section-wrapper section-space--pt_100  section-space--pb_70">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 wow move-up">

                            <div class="section-title tablet-mb__60 section-space--mb_30 tablet-mt__0 small-mt__0 small-mb__60 mt-30">
                                <h6 class="section-sub-title mb-20">Blogs & news</h6>
                                <h3 class="heading">Core Engineering <span class="text-color-primary"> Expertise</span></h3>
                                <ul class="infotechno-blog-list mt-30">
                                    <li>
                                        <a href="services.php">Automation & Robotics Solutions</a>
                                    </li>
                                    <li>
                                        <a href="services.php">Special Purpose Machines (SPM)</a>
                                    </li>
                                    <li>
                                        <a href="services.php">Product Development & R&D</a>
                                    </li>
                                    <li>
                                        <a href="services.php">Embedded Systems & IoT</a>
                                    </li>
                                    <li>
                                        <a href="services.php">CAD/CAM & Rapid Prototyping</a>
                                    </li>
                                </ul>

                            </div>

                        </div>

                        <?php
                        $home_blogs = mysqli_query($con, "SELECT * FROM blogs WHERE status = 'active' ORDER BY created_at DESC LIMIT 2");
                        while($h_blog = mysqli_fetch_assoc($home_blogs)):
                        ?>
                        <div class="col-lg-4 col-md-6 wow move-up">
                            <!--======= Single Blog Item Start ========-->
                            <div class="single-blog-item blog-grid">
                                <!-- Post Feature Start -->
                                <div class="post-feature blog-thumbnail">
                                    <a href="blog-details.php?id=<?php echo $h_blog['id']; ?>">
                                        <img class="img-fluid" src="<?php echo !empty($h_blog['image1']) ? $h_blog['image1'] : 'assets/images/blog/blog-03-370x230.webp'; ?>" alt="<?php echo htmlspecialchars($h_blog['title']); ?>" style="height: 230px; width: 100%; object-fit: cover;">
                                    </a>
                                </div>
                                <!-- Post Feature End -->

                                <!-- Post info Start -->
                                <div class="post-info lg-blog-post-info">
                                    <div class="post-meta">
                                        <div class="post-date">
                                            <span class="far fa-calendar meta-icon"></span>
                                            <?php echo date('M d, Y', strtotime($h_blog['created_at'])); ?>
                                        </div>
                                    </div>

                                    <h5 class="post-title font-weight--bold">
                                        <a href="blog-details.php?id=<?php echo $h_blog['id']; ?>"><?php echo htmlspecialchars($h_blog['title']); ?></a>
                                    </h5>

                                    <div class="post-excerpt mt-15">
                                        <p><?php echo htmlspecialchars($h_blog['short_description']); ?></p>
                                    </div>
                                    <div class="btn-text">
                                        <a href="blog-details.php?id=<?php echo $h_blog['id']; ?>">Read more <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <!-- Post info End -->
                            </div>
                            <!--===== Single Blog Item End =========-->
                        </div>
                        <?php endwhile; ?>


                    </div>
                </div>
            </div>
            <!--====================  Blog Section End  ====================-->
            <!--====================  Conact us Section Start ====================-->
            <div class="contact-us-section-wrappaer infotechno-contact-us-bg section-space--ptb_120">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-lg-6">
                <div class="conact-us-wrap-one">
                    <h3 class="heading">Optimize your production by <span class="text-color-primary">partnering</span> with our engineering experts. </h3>
                    <div class="sub-heading">We are ready to tackle your toughest industrial challenges.<br>Contact us for a detailed feasibility analysis, system assessment, or custom automation quote.</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="contact-info-one text-center">
                    <div class="icon">
                        <span class="fas fa-phone"></span>
                    </div>
                    <h6 class="heading font-weight--reguler">Call our technical team!</h6>
                    <h2 class="call-us"><a href="tel:+919409944101">+91 9409944101</a></h2>
                    <div class="contact-us-button mt-20">
                        <a href="contact-us.php" class="btn btn--secondary">Get a Quote</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
            <!--====================  Conact us Section End  ====================-->
        </div>
    </div>

<?php include 'includes/footer.php'; ?>
