<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="zxx" dir="ltr">

<?php
$current_page = basename($_SERVER['PHP_SELF']);
$page_titles = [
    'index.php' => 'OMACTUO - Industrial Robotics & Automation Solutions by OM TECHNOMATION',
    'about.php' => 'About OMACTUO - Indian Motion Systems & Robotics Engineering Leader',
    'services.php' => 'Automation & Robotics Services - OM TECHNOMATION Industrial Solutions',
    'products.php' => 'Industrial Automation Products Catalogue - OMACTUO Motion Systems',
    'blogs.php' => 'Industry Insights & Engineering Blogs - OMACTUO Motion technology'
];
$active_title = 'OMACTUO - Robotics & Automation';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $active_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="OMACTUO by OM TECHNOMATION: Leading Indian electromechanical brand specializing in industrial robotics, motion systems, rotary actuators, and custom automation engineering." >
    <meta name="keywords" content="omactuo, om technomation, industrial robotics india, automation systems, motion technology, mechatronics company, rotary actuators, linear actuators, special purpose machines, industrial engineering" >
    <meta name="author" content="OM TECHNOMATION">
    <link rel="canonical" href="https://omactuo.com/<?php echo $current_page; ?>">
    <link rel="icon" href="uploads/logo.ico">

    <!-- CSS
        ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

    <!-- Font Family CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/fontawesome-all.min.css">

    <!-- Swiper slider CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper.min.css">

    <!-- animate-text CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate-text.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">

    <!-- Light gallery CSS -->
    <link rel="stylesheet" href="assets/css/plugins/lightgallery.min.css">
    
    <!-- Swiper JS -->
    <script defer src="assets/js/plugins/swiper.min.js"></script>

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->

    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
        <link rel="stylesheet" href="assets/css/plugins/plugins.min.css"> -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>




    <!-- <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div> -->

    <!--====================  header area ====================-->
    <div class="header-area header-area--default" style="background-color: #FFFFFF;">

        <!-- Header Top Wrap Start -->
        <?php 
        include 'conneaction.php';
        $tag_res = mysqli_query($con, "SELECT * FROM tag_line WHERE id = 1");
        $tag_data = mysqli_fetch_assoc($tag_res);
        $tag_content = isset($tag_data['content']) ? $tag_data['content'] : 'Now Hiring: Are you a driven and motivated 1st Line IT Support Engineer?';
        ?>
<div class="header-top-wrap border-bottom" style="background-color: #FF5F1F;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <style>
    .marquee-wrapper {
        width: 100%;
        overflow: hidden;
        background-color:#FF5F1F;
        color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .marquee-item {
        padding: 10px 50px;
        margin: 0;
        font-size: 15px;
        font-weight: 500;
        white-space: normal;
        text-align: center;
        width: 100%;
    }

    /* Because the track has two identical halves, sliding exactly 50% creates a mathematically perfect loop */
    @keyframes scroll-text {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>

<div class="marquee-wrapper">
    <div class="marquee-track">
        
        <div style="display: flex;">
            <p class="marquee-item"><?php echo $tag_content; ?></p>
           
        </div>
        
       
    </div>
</div>
      </div>
    </div>
  </div>
</div>
    <!-- Header Top Wrap End -->
<style>
    body {
        font-size: 95% !important;
    }
        
        /* html, body, h1, h2, h3, h4, h5, h6, h1 span, h2 span, h3 span, h4 span, h5 span, h6 span, p, a, span, button, input, label {
        font-size: 95% !important; */
    /* } */
    .top-message {
  word-wrap: break-word;
  overflow-wrap: break-word;
}
.top-message {
  word-break: break-word;
  white-space: normal;
}

/* Marquee Animation */
.top-message-wrapper {
    overflow: hidden;
}
.top-message {
    white-space: nowrap;
    animation: slide-left 20s linear infinite;
}
.top-message:hover {
    animation-play-state: paused;
}
@keyframes slide-left {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}
</style>

        <!-- Header Bottom Wrap Start -->
        <div class="header-bottom-wrap header-sticky">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header default-menu-style position-relative">

                            <!-- brand logo -->
                          <div class="header__logo" style="padding-top: 5px; padding-bottom: 5px;">
    <a href="index.php">
        <img src="uploads/logo1.png" alt="OMACTUO Logo" class="logo-img" loading="lazy">
    </a>
</div>
 <style>
    /* Desktop */
.logo-img {
    height: 52px;
    width: auto;
}

/* Mobile View */
@media (max-width: 767px) {
    .logo-img {
        height: 45px;   /* Change as needed */
        width: auto;
    }
}
 </style>
                            <!-- header midle box  -->
                            <div class="header-midle-box">
                                <div class="header-bottom-wrap d-md-block d-none">
                                    <div class="header-bottom-inner">
                                        <div class="header-bottom-left-wrap">
                                            <!-- navigation menu -->
                                            <div class="header__navigation d-none d-xl-block" style="margin-left: 20px;">
                                                <nav class="navigation-menu primary--menu">

                                                    <ul>
                                                        <li><a href="index.php"><span>Home</span></a></li>
                                                       
                                                        <li><a href="products.php"><span>Product</span></a>
                                                            <!-- Mega Menu Start -->
                                                            <!-- <div class="megamenu megamenu--mega" style="width: 100vw; left: 50%; transform: translateX(-50%); padding: 30px; columns: 4; column-gap: 30px; max-height: 80vh; overflow-y: auto; display: block;">
                                                                <?php
                                                                $mega_cats = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' ORDER BY category_name ASC");
                                                                while($mcat = mysqli_fetch_assoc($mega_cats)):
                                                                ?>
                                                                <div class="mega-column" style="break-inside: avoid; display: inline-block; width: 100%; margin-bottom: 30px;">
                                                                    <h6 class="page-list-title mb-10" style="font-weight: 700; color: #0B0B45;"><a href="products.php?cat=<?php echo $mcat['id']; ?>"><?php echo htmlspecialchars($mcat['category_name']); ?></a></h6>
                                                                    <ul class="mega-sub-menu" style="list-style: none; padding: 0;">
                                                                        <?php
                                                                        $mega_subs = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = ".$mcat['id']." AND status = 'active' ORDER BY sub_category_name ASC");
                                                                        while($msub = mysqli_fetch_assoc($mega_subs)):
                                                                        ?>
                                                                        <li style="margin-bottom: 5px;">
                                                                            <a href="products.php?sub=<?php echo $msub['id']; ?>" style="font-size: 14px; font-weight: 600; color: #333; decoration: none;"><?php echo htmlspecialchars($msub['sub_category_name']); ?></a>
                                                                            <?php
                                                                            $mega_ters = mysqli_query($con, "SELECT * FROM tertiary_categories WHERE sub_category_id = ".$msub['id']." AND status = 'active' ORDER BY tertiary_category_name ASC LIMIT 5");
                                                                            if(mysqli_num_rows($mega_ters) > 0):
                                                                            ?>
                                                                            <ul class="mega-ter-menu" style="list-style: none; padding-left: 10px; margin-top: 2px;">
                                                                                <?php while($mter = mysqli_fetch_assoc($mega_ters)): ?>
                                                                                <li><a href="products.php?ter=<?php echo $mter['id']; ?>" style="font-size: 12px; color: #777;"><?php echo htmlspecialchars($mter['tertiary_category_name']); ?></a></li>
                                                                                <?php endwhile; ?>
                                                                            </ul>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                        <?php endwhile; ?>
                                                                    </ul>
                                                                </div>
                                                                <?php endwhile; ?>
                                                            </div> -->
                                                            <!-- Mega Menu End -->
                                                        </li>
                                                        <li><a href="services.php"><span>Service</span></a></li>
                                                        <li><a href="blogs.php"><span>Blogs</span></a></li>
                                                         <li><a href="about.php"><span>About</span></a></li>
                                                        <li><a href="contact-us.php"><span>Contact</span></a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- header right box -->
                            <div class="header-right-box">
                                <div class="header-right-inner" id="hidden-icon-wrapper">
                                    <!-- Cart button: desktop only (xl+) — hidden on tablet/mobile to avoid duplicate with mobile-header-cart -->
                                    <div class="header-cart-icon d-none d-xl-block" onclick="openCartSidebar()">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span class="cart-count" id="cart-count">0</span>
                                    </div>
                                </div>

                                <!-- mobile cart icon -->
                                <div class="header-cart-icon mobile-header-cart d-block d-xl-none" onclick="openCartSidebar()">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-count" id="mobile-header-cart-count">0</span>
                                </div>

                                <!-- mobile menu -->
                                <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!-- hidden icons menu -->
                                <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                    <a href="#">
                                        <i class="far fa-ellipsis-h-alt"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom Wrap End -->

    </div>
    <!--====================  End of header area  ====================-->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <!-- logo -->
                            <div class="logo">
                                <a href="index.php">
                                    <img src="uploads/logo.png" class="img-fluid" alt="OMACTUO Logo" style="height: 48px; width: auto;" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="header-cart-icon mobile-cart-icon" onclick="openCartSidebar()">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="cart-count" id="mobile-cart-count">0</span>
                                </span>
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        
                        <li><a href="products.php">Product</a></li>
                        <li><a href="services.php">Service</a></li>
                        <li><a href="blogs.php">Blogs</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->

    <!-- Cart Sidebar -->
    <div class="cart-sidebar-overlay" id="cart-sidebar-overlay" onclick="closeCartSidebar()"></div>
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-sidebar-header">
            <h5>Shopping Cart</h5>
            <button class="cart-close-btn" onclick="closeCartSidebar()">&times;</button>
        </div>
        <div class="cart-sidebar-body" id="cart-items">
            <div class="cart-empty-message" id="cart-empty">
                <i class="fas fa-shopping-cart" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i>
                <p>Your cart is empty</p>
            </div>
        </div>
        <div class="cart-sidebar-footer">
            <!-- 2x font size -->
            <div class="cart-total ">
                <span  style="font-size: 20px;" >Total:</span>
                <span class="cart-total-amount" id="cart-total"  style="font-size: 20px;">Rs. 0.00</span>
            </div>
        <button 
  class="btn btn-primary w-100 buy-now-btn d-flex align-items-center justify-content-center"
  onclick="checkout()"
  name="buy-now">
  BUY NOW
</button>
        </div>
    </div>

    <style>
        .header-cart-icon {
            position: relative;
            cursor: pointer;       
            padding: 10px;
            color: #333;
            font-size: 20px;
            transition: color 0.3s ease;
        }
        
        .header-cart-icon:hover {
            color: #0B0B45;
        }
        
.cart-count {
            position: absolute;
            top: 2px;
            right: 0;
            background: #FF5F1F;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .cart-sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .cart-sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
.cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 100%;
            max-width: 400px;
            height: 100%;
            background: #FFFFFF;
            z-index: 9999;
            transition: right 0.3s ease;
            display: flex;
            flex-direction: column;
            box-shadow: -5px 0 25px rgba(0, 0, 0, 0.15);
        }
        
        .cart-sidebar.active {
            right: 0;
        }
        
.cart-sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 25px;
            border-bottom: 1px solid #e0e0e0;
            background: #FFFFFF;
        }
        
        .cart-sidebar-header h5 {
            margin: 0;
            font-weight: 700;
            color: #333;
        }
        
        .cart-close-btn {
            background: none;
            border: none;
            font-size: 28px;
            color: #666;
            cursor: pointer;
            line-height: 1;
            padding: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s ease;
        }
        
        .cart-close-btn:hover {
            color: #333;
        }
        
        .cart-sidebar-body {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }
        
        .cart-empty-message {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }
        
        .cart-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: contain;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 5px;
        }
        
        .cart-item-details {
            flex: 1;
        }
        
        .cart-item-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .cart-item-sku {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }
        
        .cart-item-price {
            font-size: 15px;
            font-weight: 700;
            color: #0B0B45;
        }
        
        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        
        .cart-qty-btn {
            width: 28px;
            height: 28px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        
        .cart-qty-btn:hover {
            border-color: #0B0B45;
            color: #0B0B45;
        }
        
        .cart-qty-value {
            font-weight: 600;
            min-width: 30px;
            text-align: center;
        }
        
        .cart-item-remove {
            background: none;
            border: none;
            color: #dc3545;
            font-size: 12px;
            cursor: pointer;
            padding: 0;
            margin-top: 8px;
        }
        
        .cart-item-remove:hover {
            text-decoration: underline;
        }
        
        .cart-sidebar-footer {
            padding: 20px 25px;
            border-top: 1px solid #e0e0e0;
            background: #f8f9fa;
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }
        
        .cart-total-amount {
            font-size: 20px;
            color: #0B0B45;
        }
        
.buy-now-btn {
            background-color: #FF5F1F !important;
            border-color: #FF5F1F !important;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .buy-now-btn:hover {
            background-color: #0B0B45 !important;
            border-color: #0B0B45 !important;
        }
        
        .buy-now-btn:hover {
            background-color: #0B0B45 !important;
            border-color: #0B0B45 !important;
        }

        .mobile-cart-icon {
            margin-right: 15px;
        }

        .mobile-menu-content {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .mobile-header-cart {
            margin-right: 15px;
        }

        /* Mega Menu Enhancements */
        .navigation-menu > ul > li {
            position: static !important;
        }
        .header-bottom-wrap {
            position: relative;
        }
        .navigation-menu > ul > li:hover .megamenu {
            visibility: visible;
            opacity: 1;
            transform: translateX(-50%) translateY(0) !important;
        }
        .megamenu {
            background: #fff;
            border-top: 2px solid #0B0B45;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            transform: translateX(-50%) translateY(20px) !important;
        }
        .mega-column a:hover {
            color: #FF5F1F !important;
            padding-left: 5px;
        }
        .mega-column a {
            transition: all 0.2s ease;
        }

        /* ── Scroll-blur for sticky header ── */
        .header-bottom-wrap.header-sticky {
            transition: background-color 0.35s ease, backdrop-filter 0.35s ease, box-shadow 0.35s ease;
        }
        .header-bottom-wrap.header-sticky.header-scrolled {
            background-color: rgba(255, 255, 255, 0.75) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
        }
    </style>

    <style>
        #leadCaptureModal .modal-content {
            border-radius: 20px;
            overflow: hidden;
            border: none;
        }
        #leadCaptureModal .modal-header {
            background: linear-gradient(135deg, #0B0B45, #0056b3);
            padding: 30px;
            border: none;
            display: block;
            text-align: center;
        }
        #leadCaptureModal .modal-header .icon-wrap {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
        }
        #leadCaptureModal .modal-title {
            font-size: 24px;
            margin: 0;
            color: #fff;
        }
        #leadCaptureModal .modal-body {
            padding: 40px;
        }
        #leadCaptureModal .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            background: #fcfcfc;
            transition: all 0.3s;
        }
        #leadCaptureModal .form-control:focus {
            border-color: #0B0B45;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(11, 11, 69, 0.1);
        }
        #leadCaptureModal .form-label {
            font-size: 13px;
            color: #666;
            margin-bottom: 8px;
            display: block;
        }
        #leadCaptureModal .btn-continue {
            background: #0B0B45;
            border: none;
            border-radius: 8px;
            padding: 15px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        #leadCaptureModal .btn-continue:hover {
            background: #0B0B45;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(11, 11, 69, 0.3);
        }

        /* Sticky Contact Buttons */
        .sticky-contact-wrapper {
            position: fixed;
            bottom: 40px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 9999;
            transition: all 0.3s ease;
        }
        body.cart-active .sticky-contact-wrapper {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
        .sticky-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
        }
        .whatsapp-btn {
            background-color: #25d366;
        }
        .call-btn {
            background-color: #0B0B45;
        }
        .sticky-btn:hover {
            transform: scale(1.1);
            color: #fff;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        .pulse-animation {
            animation: pulse-green 2s infinite;
            border-radius: 50%;
        }
        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }
        @media (max-width: 768px) {
            .sticky-contact-wrapper {
                bottom: 25px;
                right: 20px;
                gap: 10px;
            }
            .sticky-btn {
                width: 48px;
                height: 48px;
                font-size: 20px;
            }
        }
    </style>

    <!-- Lead Capture Modal -->
    <div class="modal fade" id="leadCaptureModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10000;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content shadow-2xl">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="position: absolute; right: 20px; top: 20px;"></button>
                    <div class="icon-wrap text-white">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <h5 class="modal-title fw-bold">Ready to take the next step?</h5>
                    <p class="mb-0 text-white-50 small mt-2">Provide your details to continue your shopping experience</p>
                </div>
                <div class="modal-body">
                    <form id="leadCaptureForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">FIRST NAME</label>
                                <input type="text" name="first_name" class="form-control" placeholder="John" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">LAST NAME</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Doe" required>
                            </div>
                            <div class="col-12 mt-4">
                                <label class="form-label">EMAIL ADDRESS</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="far fa-envelope text-muted"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0 ps-0" placeholder="john@example.com" required>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label class="form-label">PHONE NUMBER</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone-alt text-muted"></i></span>
                                    <input type="tel" name="phone" class="form-control border-start-0 ps-0" placeholder="+91 00000 00000" required>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label class="form-label">DELIVERY ADDRESS</label>
                                <textarea name="delivery_address" class="form-control" rows="3" placeholder="Enter your complete delivery address" required></textarea>
                            </div>
                        </div>
                        <style>.btn-continue {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    font-weight: 600;
    letter-spacing: 0.5px;
    padding: 12px 16px;
}

.btn-continue i {
    font-size: 0.75rem;
}</style>
                        <div class="mt-5">
<button type="submit" class="btn btn-primary w-100 btn-continue text-white">
    <span>PROCEED TO CART</span>
    <i class="fas fa-chevron-right"></i>
</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Sticky Buttons -->
    <div class="sticky-contact-wrapper">
        <a href="https://wa.me/919409944101" class="sticky-btn whatsapp-btn pulse-animation" target="_blank" title="WhatsApp Us">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="tel:+919409944101" class="sticky-btn call-btn" title="Call Us">
            <i class="fas fa-phone-alt"></i>
        </a>
    </div>

    <script>
        let cart = <?php echo json_encode(isset($_SESSION['Omactuo_cart']) ? $_SESSION['Omactuo_cart'] : []); ?>;
        
        function saveCart() {
            fetch('ajax/sync_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'cart=' + encodeURIComponent(JSON.stringify(cart))
            });
        }
        let customerCaptured = <?php echo isset($_SESSION['customer_info']) ? 'true' : 'false'; ?>;
        let pendingProduct = null;
        
        // Global Currency State
        window.exchangeRates = { INR: 1, USD: 0, EUR: 0 };
        window.currencySymbols = { INR: 'Rs. ', USD: '$ ', EUR: '€ ' };
        window.currentCurrency = localStorage.getItem('selectedCurrency') || 'INR';

        async function initRates() {
            try {
                const response = await fetch('https://api.exchangerate-api.com/v4/latest/INR');
                const data = await response.json();
                window.exchangeRates.USD = data.rates.USD;
                window.exchangeRates.EUR = data.rates.EUR;
                
                if (typeof applyCurrency === 'function') {
                    applyCurrency(window.currentCurrency);
                }
                updateCartDisplay();
            } catch (error) {
                console.error('Error fetching rates:', error);
            }
        }
        // Initialize display immediately
        updateCartDisplay();
        
        initRates().then(() => {
            updateCartDisplay();
        });

        function openCartSidebar() {
            document.getElementById('cart-sidebar').classList.add('active');
            document.getElementById('cart-sidebar-overlay').classList.add('active');
            document.body.style.overflow = 'hidden';
            document.body.classList.add('cart-active');
        }
        
        function closeCartSidebar() {
            document.getElementById('cart-sidebar').classList.remove('active');
            document.getElementById('cart-sidebar-overlay').classList.remove('active');
            document.body.style.overflow = '';
            document.body.classList.remove('cart-active');
        }
        
        function addToCart(product) {
            if (!customerCaptured) {
                pendingProduct = product;
                var myModal = new bootstrap.Modal(document.getElementById('leadCaptureModal'));
                myModal.show();
            } else {
                recordActionAndAdd(product);
            }
        }

        function recordActionAndAdd(product) {
            // Send tracking data to server
            fetch('ajax/save_cart_action.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'product_id=' + product.id
            }).then(() => {
                performLocalAddToCart(product);
            });
        }

        function performLocalAddToCart(product) {
            const qtyToAdd = parseInt(product.qty) || 1;
            const existingItem = cart.find(item => item.id === product.id);
            
            if (existingItem) {
                existingItem.qty += qtyToAdd;
            } else {
                cart.push({
                    id: product.id,
                    title: product.title,
                    sku: product.sku,
                    price: product.price,
                    image: product.image,
                    qty: qtyToAdd
                });
            }
            
            updateCartDisplay();
            saveCart();
            openCartSidebar();
            Swal.fire({
                title: 'Success!',
                text: 'Item added to your cart.',
                icon: 'success',
                confirmButtonColor: '#0B0B45'
            });
        }

        // Handle Lead Capture Form Submission
        document.getElementById('leadCaptureForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('product_id', pendingProduct.id);

            fetch('ajax/save_cart_action.php', {
                method: 'POST',
                body: new URLSearchParams(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Store customer info in session
                    customerCaptured = true;
                    
                    // Hide the modal
                    const modalElement = document.getElementById('leadCaptureModal');
                    const modalInstance = bootstrap.Modal.getInstance(modalElement);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                    
                    // Add the pending product to cart
                    performLocalAddToCart(pendingProduct);
                    pendingProduct = null;
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while processing your request.');
            });
        });
        
        function removeFromCart(productId) {
            cart = cart.filter(item => item.id !== productId);
            updateCartDisplay();
            saveCart();
        }
        
        function updateQuantity(productId, change) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.qty += change;
                if (item.qty <= 0) {
                    removeFromCart(productId);
                } else {
                    updateCartDisplay();
                    saveCart();
                }
            }
        }

        function setQuantity(productId, newValue) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                let val = parseInt(newValue);
                if (isNaN(val) || val <= 0) val = 1;
                item.qty = val;
                updateCartDisplay();
                saveCart();
            }
        }
        
        function updateCartDisplay() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartCount = document.getElementById('cart-count');
            const mobileCartCount = document.getElementById('mobile-cart-count');
            const mobileHeaderCartCount = document.getElementById('mobile-header-cart-count');
            const cartTotal = document.getElementById('cart-total');
            const cartEmpty = document.getElementById('cart-empty');
            
            const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
            const totalAmount = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            
            const rate = window.exchangeRates[window.currentCurrency] || 1;
            const symbol = window.currencySymbols[window.currentCurrency];

            if(cartCount) cartCount.textContent = totalItems;
            if (mobileCartCount) mobileCartCount.textContent = totalItems;
            if (mobileHeaderCartCount) mobileHeaderCartCount.textContent = totalItems;
            
            if(cartTotal) cartTotal.textContent = symbol + (totalAmount * rate).toFixed(2);
            
            if (cart.length === 0) {
                if(cartEmpty) cartEmpty.style.display = 'block';
                cartItemsContainer.innerHTML = '<div class="cart-empty-message" id="cart-empty"><i class="fas fa-shopping-cart" style="font-size: 48px; color: #ccc; margin-bottom: 15px;"></i><p>Your cart is empty</p></div>';
            } else {
                if(cartEmpty) cartEmpty.style.display = 'none';
                let html = '';
                cart.forEach(item => {
                    html += `
                        <div class="cart-item">
                            <img src="${item.image}" alt="${item.title}" class="cart-item-image" loading="lazy">
                            <div class="cart-item-details">
                                <div class="cart-item-title">${item.title}</div>
                                <div class="cart-item-sku">SKU: ${item.sku}</div>
                                <div class="cart-item-price">${symbol}${(item.price * rate).toFixed(2)}</div>
                                <div class="cart-item-qty">
                                    <button class="cart-qty-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                                    <input type="number" min="1" class="cart-qty-input" value="${item.qty}" 
                                        onchange="setQuantity(${item.id}, this.value)" 
                                        style="width: 45px; text-align: center; border: 1px solid #ddd; border-radius: 4px; margin: 0 5px; font-size: 13px; font-weight: 600; -moz-appearance: textfield;">
                                    <button class="cart-qty-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                                </div>
                                <button class="cart-item-remove" onclick="removeFromCart(${item.id})">Remove</button>
                            </div>
                        </div>
                    `;
                });
                cartItemsContainer.innerHTML = html;
            }
        }
        
        function checkout() {
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            
            let message = "Hello Omactuo, I would like to order the following items:\n\n";
            const rate = window.exchangeRates[window.currentCurrency] || 1;
            const symbol = window.currencySymbols[window.currentCurrency];

            cart.forEach((item, index) => {
                message += `${index + 1}. *${item.title}*\n`;
                message += `   SKU: ${item.sku}\n`;
                message += `   Qty: ${item.qty}\n`;
                message += `   Price: ${symbol}${(item.price * rate).toFixed(2)}\n\n`;
            });
            
            const total = document.getElementById('cart-total').textContent;
            message += `*Total Amount: ${total}*`;
            
            const encodedMessage = encodeURIComponent(message);
            const whatsappNumber = "919409944101"; // Update with actual number if provided
            window.open(`https://wa.me/${whatsappNumber}?text=${encodedMessage}`, '_blank');
        }
        
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                closeCartSidebar();
            }
        });

        // ── Scroll-blur on sticky header ──
        (function () {
            var stickyHeader = document.querySelector('.header-bottom-wrap.header-sticky');
            if (!stickyHeader) return;
            var SCROLL_THRESHOLD = 50;
            function onScroll() {
                if (window.scrollY > SCROLL_THRESHOLD) {
                    stickyHeader.classList.add('header-scrolled');
                } else {
                    stickyHeader.classList.remove('header-scrolled');
                }
            }
            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll(); // run once on load in case page is already scrolled
        })();
    </script>