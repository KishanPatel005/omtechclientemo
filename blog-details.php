<?php 
include 'includes/header.php'; 

$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$blog_res = mysqli_query($con, "SELECT * FROM blogs WHERE id = $blog_id AND status = 'active'");
$blog = mysqli_fetch_assoc($blog_res);

if(!$blog) {
    header("Location: blogs.php");
    exit();
}
?>

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <h2 class="breadcrumb-title"><?php echo htmlspecialchars($blog['title']); ?></h2>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="blogs.php">Blogs</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="site-wrapper-reveal">
    <div class="blog-details-wrapper section-space--ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="blog-details-post-wrap">
                        <!-- Blog Post Image -->
                        <div class="post-featured-image mb-30">
                            <img src="<?php echo !empty($blog['image1']) ? $blog['image1'] : 'assets/images/blog/blog-details-01-1170x500.webp'; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($blog['title']); ?>" style="width: 100%; border-radius: 10px;">
                        </div>

                        <!-- Blog Post Meta -->
                        <div class="post-meta mb-20">
                            <span class="post-date"><i class="far fa-calendar-alt me-2"></i> <?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span>
                            <span class="post-author ms-4"><i class="far fa-user me-2"></i> By <?php echo htmlspecialchars($blog['author']); ?></span>
                        </div>

                        <!-- Blog Post Content -->
                        <div class="post-content-inner">
                            <h2 class="post-title mb-30"><?php echo htmlspecialchars($blog['title']); ?></h2>
                            <div class="post-description leading-relaxed" style="font-size: 16px; color: #555;">
                                <?php echo $blog['description']; ?>
                            </div>
                        </div>

                        <!-- Gallery Images if any -->
                        <?php if($blog['image2'] || $blog['image3'] || $blog['image4']): ?>
                        <div class="row mt-40 g-3">
                            <?php for($i=2; $i<=4; $i++): 
                                if($blog["image$i"]): ?>
                            <div class="col-md-4">
                                <img src="<?php echo $blog["image$i"]; ?>" class="img-fluid" style="border-radius: 8px; height: 250px; width: 100%; object-fit: cover;">
                            </div>
                            <?php endif; endfor; ?>
                        </div>
                        <?php endif; ?>
<br><br>
                        <!-- Navigation -->
                        <div class="post-navigation-wrapper mt-50 border-top pt-30">
                            <div class="row">
                                <div class="col-6">
                                    <a href="blogs.php" class="btn btn-outline-primary"><i class="fas fa-arrow-left me-2"></i> Back to Blogs</a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</div>

<?php include 'includes/footer.php'; ?>
