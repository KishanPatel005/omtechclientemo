<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1200">
    <title>Omactuo | Admin Dashboard</title>
    <style>
        /* Force desktop scale and layout */
        .wrapper {
            min-width: 1200px !important;
            overflow-x: auto !important;
        }
    </style>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
document.addEventListener("DOMContentLoaded", function() {
    // Select all images on the page
    const images = document.querySelectorAll('img');

    images.forEach(img => {
        let src = img.getAttribute('src');
        
        // If the source exists and contains the "../http" error
        if (src && src.startsWith('../http')) {
            // Remove the first 3 characters ("../")
            const cleanSrc = src.substring(3);
            img.setAttribute('src', cleanSrc);
        }
    });
});
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ms-auto" style="margin-left: auto;">
            <li class="nav-item">
                <a class="nav-link text-danger" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <img src="../uploads/logo.png" alt="Omactuo Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Omactuo Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="manage_sliders.php" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>Sliders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tag_line.php" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Tag line</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="manage_blogs.php" class="nav-link">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>Blogs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="testimonials.php" class="nav-link">
                            <i class="nav-icon fas fa-quote-left"></i>
                            <p>Testimonials</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="welcome_popup.php" class="nav-link">
                            <i class="nav-icon fas fa-window-maximize"></i>
                            <p>Welcome Popup</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="about_us.php" class="nav-link">
                            <i class="nav-icon fas fa-info-circle"></i>
                            <p>Aboutus</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="categories.php" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="sub_categories.php" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>sub Categories</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="products.php" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="reviews.php" class="nav-link">
                            <i class="nav-icon fas fa-star"></i>
                            <p>Reviews</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="inquiries.php" class="nav-link">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>Inquiries</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="card_added.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Card Added</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="client_list.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Client List</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
