<?php 
include 'includes/header.php'; 
include 'includes/conneaction.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>window.location='products.php';</script>";
    exit;
}

$id = (int)$_GET['id'];
$prod_res = mysqli_query($con, "SELECT p.*, c.category_name 
                                FROM products p 
                                LEFT JOIN categories c ON p.category_id = c.id 
                                WHERE p.id = $id AND p.status = 'active'");

if (mysqli_num_rows($prod_res) == 0) {
    echo "<script>window.location='products.php';</script>";
    exit;
}

$prod = mysqli_fetch_assoc($prod_res);
?>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <style>
                .product-large-image { display: flex; justify-content: center; align-items: center; background: #f8f9fa; padding: 30px; border-radius: 8px; }
                .product-large-image img { object-fit: contain; max-height: 500px; width: 100%; }
                .product-thumbs .thumb-item { display: block; padding: 10px; background: #f8f9fa; border-radius: 8px; transition: all 0.3s ease; border: 2px solid transparent; }
                .product-thumbs .thumb-item:hover { border-color: #FF5F1F; }
                .product-thumbs .thumb-item.active { border-color: #FF5F1F; background: #fff; }
                .product-thumbs .thumb-item img { width: 100%; height: auto; object-fit: contain; }
                .quantity-selector-wrapper { display: flex; align-items: center; gap: 15px; }
                .quantity-label { font-weight: 600; color: #333; margin: 0; font-size: 15px; }
                .quantity-input { display: flex; align-items: center; border: 2px solid #FF5F1F; border-radius: 8px; overflow: hidden; background: #fff; }
                .quantity-btn { width: 44px; height: 44px; border: none; background: #FF5F1F; color: #fff; font-size: 18px; font-weight: 600; cursor: pointer; transition: all 0.2s ease; display: flex; align-items: center; justify-content: center; }
                .quantity-btn:hover { background: #0B0B45; }
                .quantity-btn:active { background: #001f3d; }
                .quantity-number { width: 60px; height: 44px; border: none; text-align: center; font-size: 16px; font-weight: 600; color: #333; background: #fff; }
                .quantity-number:focus { outline: none; }
                .product-actions { display: flex; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: 30px; }
                .action-btns { display: flex; gap: 15px; flex-grow: 1; }
                .action-btns .btn { flex: 1; min-width: 160px; padding: 14px 24px; border-radius: 8px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 10px; border: none; }
                .btn-add-cart { background-color: #FF5F1F; color: #fff; }
                
                .btn-buy-now { background-color: #0B0B45; color: #fff; }
                .btn-buy-now:hover { background-color: #0B0B45; transform: translateY(-3px); box-shadow: 0 6px 20px rgba(11, 11, 69, 0.3); color: #fff; }
                
                @media (max-width: 576px) { 
                    .action-btns { flex-direction: row; width: 100%; gap: 10px; } 
                    .action-btns .btn { flex: 1; padding: 12px 6px; min-width: 0; font-size: 12px; letter-spacing: 0px; }
                    .product-actions { gap: 15px; width: 100%; } 
                    .quantity-selector-wrapper { width: 100%; justify-content: space-between; }
                    .product-price { 
                        align-items: center !important; 
                        gap: 15px !important; 
                    }
                    .currency-switcher { 
                        margin-left: auto !important; 
                        width: auto; 
                    }
                }
            </style>
        
            <!-- Product Detail Banner -->
            <div class="product-detail-banner pt-4 pb-2 section-space--pt_50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb-list" style="background: #f8f9fa; padding: 15px 25px; border-radius: 8px; display: inline-block;">
                                <ul style="list-style: none; padding: 0; margin: 0; display: flex; align-items: center; flex-wrap: wrap;">
                                    <li style="display: flex; align-items: center;"><a href="index.php" style="color: #FF5F1F; text-decoration: none; font-weight: 500; transition: all 0.2s;">Home</a><span style="margin: 0 12px; color: #999;">/</span></li>
                                    <li style="display: flex; align-items: center;"><a href="products.php" style="color: #FF5F1F; text-decoration: none; font-weight: 500; transition: all 0.2s;">Products</a><span style="margin: 0 12px; color: #999;">/</span></li>
                                    <?php if($prod['category_name']): ?>
                                    <li style="display: flex; align-items: center;"><a href="products.php?cat=<?php echo $prod['category_id']; ?>" style="color: #FF5F1F; text-decoration: none; font-weight: 500; transition: all 0.2s;"><?php echo htmlspecialchars($prod['category_name']); ?></a><span style="margin: 0 12px; color: #999;">/</span></li>
                                    <?php endif; ?>
                                    <li style="color: #555; font-weight: 600;"><?php echo htmlspecialchars($prod['product_name']); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Product Detail Content -->
            <div class="product-detail-wrapper pt-2 section-space--pb_100">
                <div class="container">
                    <div class="row">
                        <!-- Product Gallery -->
                        <div class="col-lg-6">
                            <div class="product-gallery">
                                <div class="product-large-image">
                                    <img id="main-product-img" src="<?php echo $prod['image1']; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($prod['product_name']); ?>" style="width: 100%; max-width: 600px;">
                                </div>
                                <div class="product-thumbs mt-4">
                                    <div class="row g-2">
                                        <?php for($i=1; $i<=4; $i++): 
                                            $img_key = "image".$i;
                                            if(!empty($prod[$img_key])): ?>
                                        <div class="col-3">
                                            <a href="javascript:void(0)" class="thumb-item <?php echo $i==1 ? 'active' : ''; ?>" onclick="updateMainImage('<?php echo $prod[$img_key]; ?>', this)">
                                                <img src="<?php echo $prod[$img_key]; ?>" class="img-fluid" alt="Product View <?php echo $i; ?>">
                                            </a>
                                        </div>
                                        <?php endif; endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .col-lg-6 (Gallery) -->
                        
                        <!-- Product Info -->
                        <div class="col-lg-6">
                            <div class="product-info">
                                <h1 class="product-title"><?php echo htmlspecialchars($prod['product_name']); ?></h1>
                                <div class="product-sku">
                                    <span>SKU: <?php echo htmlspecialchars($prod['sku']); ?></span>
                                </div>
                                <div class="product-brand mb-2 mt-2">
                                    <span class="badge bg-light text-dark border">Brand: <?php echo htmlspecialchars($prod['brand_name']); ?></span>
                                </div>
                                <div class="product-price d-flex align-items-center gap-3">
                                    <span class="price current-price-val" data-base-price="<?php echo $prod['price']; ?>" style="color: #FF5F1F; font-weight: 800; font-size: 28px;">Rs. <?php echo number_format($prod['price'], 2); ?></span>
                                    
                                    <div class="currency-switcher ms-3 position-relative dropdown-container">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-outline-dark dropdown-toggle currency-toggle-btn" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false" style="font-weight: 600; padding: 6px 15px; border-radius: 6px;">
                                                <i class="fas fa-coins me-1"></i> <span class="currency-label">INR</span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 100px; z-index: 1050;">
                                                <li><button class="dropdown-item currency-option active" type="button" data-currency="INR">INR</button></li>
                                                <li><button class="dropdown-item currency-option" type="button" data-currency="USD">USD</button></li>
                                                <li><button class="dropdown-item currency-option" type="button" data-currency="EUR">EUR</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="product-short-description mt-30">
                                    <div class="text-muted" style="line-height: 1.6;">
                                        <?php echo strip_tags($prod['short_technical_specifications']); ?>
                                    </div>
                                </div>
                                
                                <div class="product-actions">
                                    <div class="quantity-selector-wrapper">
                                        <label class="quantity-label">Quantity:</label>
                                        <div class="quantity-input">
                                            <button class="quantity-btn quantity-decrease">-</button>
                                            <input type="number" id="product-qty" value="1" class="quantity-number" min="1" oninput="validateQuantity(this)">
                                            <button class="quantity-btn quantity-increase">+</button>
                                        </div>
                                    </div>
                                    
                                    <div class="action-btns">
                                        <button type="button" class="btn btn-add-cart" 
                                                onclick="addToCart({
                                                    id: <?php echo (int)$prod['id']; ?>, 
                                                    title: '<?php echo addslashes($prod['product_name']); ?>', 
                                                    sku: '<?php echo addslashes($prod['sku']); ?>', 
                                                    price: <?php echo (float)$prod['price']; ?>, 
                                                    image: '<?php echo addslashes($prod['image1']); ?>',
                                                    qty: document.getElementById('product-qty').value
                                                })">
                                            <i class="fas fa-shopping-cart"></i> ADD TO CART
                                        </button>
                                        <button type="button" class="btn btn-buy-now" 
                                                onclick="buyNow(<?php echo (int)$prod['id']; ?>)">
                                            <i class="fas fa-bolt"></i> BUY NOW
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="product-meta mt-30">
                                    <div class="meta-item mt-10">
                                        <span><i class="fas fa-truck text-primary"></i> Fast shipping across all industrial hubs</span>
                                    </div>
                                    <div class="meta-item mt-10">
                                        <span><i class="fas fa-shield-alt text-primary"></i> Genuine Product Guarantee</span>
                                    </div>
                                    <?php if(!empty($prod['short_description'])): ?>
                                    <div class="meta-item mt-10">
                                        <span><i class="fas fa-info-circle text-primary"></i> <strong>Short Description:</strong> <?php echo ($prod['short_description']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(!empty($prod['short_technical_specifications'])): ?>
                                    <div class="meta-item mt-10">
                                        <span><i class="fas fa-microchip text-primary"></i> <strong>Tech Specs:</strong> <?php echo ($prod['short_technical_specifications']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- Product Tabs -->
                    <div class="row mt-60">
                        <div class="col-lg-12">
                            <div class="product-tabs">
                                <ul class="nav nav-tabs justify-content-center" id="productTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab">Description</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="specifications-tab" data-bs-toggle="tab" href="#specifications" role="tab">Specifications</a>
                                    </li>
                                    <?php
                                    $rev_count_res = mysqli_query($con, "SELECT COUNT(*) as count FROM reviews WHERE product_id = $id AND status = 'active'");
                                    $rev_count = mysqli_fetch_assoc($rev_count_res)['count'];
                                    ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab">Reviews (<?php echo $rev_count; ?>)</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content" id="productTabContent">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                                        <div class="tab-content-inner p-4" style="background: #fff; border: 1px solid #eee; border-top: none;">
                                            <?php echo $prod['description']; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="specifications" role="tabpanel">
                                        <div class="tab-content-inner p-4" style="background: #fff; border: 1px solid #eee; border-top: none;">
                                            <?php echo $prod['long_specifications']; ?>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="tab-content-inner p-4" style="background: #fff; border: 1px solid #eee; border-top: none;">
                                            <?php
                                            $rev_res = mysqli_query($con, "SELECT * FROM reviews WHERE product_id = $id AND status = 'active' ORDER BY review_date DESC");
                                            if (mysqli_num_rows($rev_res) > 0) {
                                                while($rev = mysqli_fetch_assoc($rev_res)) {
                                                    ?>
                                                    <div class="review-item mb-4 pb-3 border-bottom">
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            <h6 class="mb-0 fw-bold"><?php echo htmlspecialchars($rev['customer_name']); ?></h6>
                                                            <small class="text-muted"><?php echo date('M d, Y', strtotime($rev['review_date'])); ?></small>
                                                        </div>
                                                        <div class="text-warning mb-2">
                                                            <?php for($i=1; $i<=5; $i++): ?>
                                                                <i class="<?php echo $i <= $rev['stars'] ? 'fas' : 'far'; ?> fa-star"></i>
                                                            <?php endfor; ?>
                                                        </div>
                                                        <p class="mb-0 text-muted"><?php echo nl2br(htmlspecialchars($rev['description'])); ?></p>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                echo "<div class='text-center py-4'><p class='text-muted'>No reviews yet for this product.</p></div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    
                    <!-- Related Products -->
                    <div class="row mt-80">
                        <div class="col-lg-12">
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20 text-primary">Discover More</h6>
                                <h3 class="heading">Related <span class="text-color-primary">Products</span></h3>
                            </div>
                            
                            <div class="related-products">
                                <div class="row">
                                    <?php
                                    $cat_id = $prod['category_id'];
                                    $related_query = mysqli_query($con, "SELECT * FROM products WHERE category_id = $cat_id AND id != $id AND status = 'active' LIMIT 4");
                                    if(mysqli_num_rows($related_query) > 0) {
                                        while($rel = mysqli_fetch_assoc($related_query)) {
                                            ?>
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 section-space--mt_30">
                                                <div class="product-item" style="border: 1px solid #eee; border-radius: 8px; transition: all 0.3s ease; height: 100%;">
                                                    <div class="product-item__image-box" style="padding: 20px; text-align: center;">
                                                        <a href="product-details.php?id=<?php echo $rel['id']; ?>">
                                                            <img class="img-fluid" src="<?php echo $rel['image1']; ?>" alt="<?php echo htmlspecialchars($rel['product_name']); ?>" style="max-height: 200px; object-fit: contain;">
                                                        </a>
                                                    </div>
                                                    <div class="product-item__content text-center p-3">
                                                        <h6 class="product-item__title mb-2">
                                                            <a href="product-details.php?id=<?php echo $rel['id']; ?>" class="text-dark fw-bold" style="text-decoration: none;"><?php echo htmlspecialchars($rel['product_name']); ?></a>
                                                        </h6>
                                                        <div class="product-item__price text-primary fw-bold mb-3 current-price-val" data-base-price="<?php echo $rel['price']; ?>">Rs. <?php echo number_format($rel['price'], 2); ?></div>
                                                        <div class="product-item__button-box">
                                                            <button class="btn btn-primary btn-sm w-100" style="background-color: #FF5F1F; border: none;"
                                                                    onclick="addToCart({id: <?php echo $rel['id']; ?>, title: '<?php echo addslashes($rel['product_name']); ?>', sku: '<?php echo addslashes($rel['sku']); ?>', price: <?php echo $rel['price']; ?>, image: '<?php echo $rel['image1']; ?>'})">
                                                                ADD TO CART
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<div class='col-12 text-center'><p class='text-muted'>No related products found.</p></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .container -->
            </div> <!-- .product-detail-wrapper -->
        </div> <!-- .site-wrapper-reveal -->
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
    </div> <!-- #main-wrapper -->

    <script>
        function updateMainImage(src, element) {
            document.getElementById('main-product-img').src = src;
            document.querySelectorAll('.thumb-item').forEach(item => item.classList.remove('active'));
            element.classList.add('active');
        }

        function buyNow(productId) {
            const qty = document.getElementById('product-qty').value;
            const productName = '<?php echo addslashes($prod['product_name']); ?>';
            const message = encodeURIComponent('Hi, I want to buy ' + productName + ' (Quantity: ' + qty + ')');
            const whatsappUrl = 'https://wa.me/919409944101?text=' + message;
            
            // Record the action and add to cart
            if (typeof addToCart === 'function') {
                addToCart({
                    id: productId,
                    title: productName,
                    sku: '<?php echo addslashes($prod['sku']); ?>',
                    price: <?php echo $prod['price']; ?>,
                    image: '<?php echo $prod['image1']; ?>',
                    qty: qty
                });
            }
            
            // Redirect to WhatsApp after a brief delay to ensure cart is updated
            setTimeout(() => {
                window.open(whatsappUrl, '_blank');
            }, 500);
        }

        function validateQuantity(element) {
            let value = parseInt(element.value);
            if (isNaN(value) || value < 1) {
                element.value = 1;
            }
        }

        document.querySelectorAll('.quantity-btn').forEach(button => {
            button.addEventListener('click', function() {
                const input = document.getElementById('product-qty');
                let value = parseInt(input.value);
                if (this.classList.contains('quantity-decrease') && value > 1) {
                    input.value = value - 1;
                } else if (this.classList.contains('quantity-increase')) {
                    input.value = value + 1;
                }
            });
        });

        // Currency Conversion Logic
        function applyCurrency(currency) {
            const rate = window.exchangeRates && window.exchangeRates[currency] ? window.exchangeRates[currency] : 1;
            const symbol = window.currencySymbols && window.currencySymbols[currency] ? window.currencySymbols[currency] : (currency == 'INR' ? 'Rs. ' : (currency == 'USD' ? '$' : '€')); // Safe fallback
            
            document.querySelectorAll('.current-price-val').forEach(el => {
                const basePrice = parseFloat(el.getAttribute('data-base-price'));
                if (!isNaN(basePrice) && typeof basePrice === 'number') {
                    const converted = basePrice * rate;
                    el.textContent = symbol + "" + converted.toLocaleString(undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                } else {
                    el.textContent = symbol + "0.00";
                }
            });

            document.querySelectorAll('.currency-label').forEach(label => label.textContent = currency);
            document.querySelectorAll('.currency-option').forEach(btn => {
                if (btn.getAttribute('data-currency') === currency) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            localStorage.setItem('selectedCurrency', currency);
            window.currentCurrency = currency;
            
            if (typeof updateCartDisplay === 'function') {
                updateCartDisplay();
            }
        }

        document.querySelectorAll('.currency-option').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const currency = this.getAttribute('data-currency');
                applyCurrency(currency);
                
                // Close dropdown manually after selecting
                const dropdownMenu = this.closest('.dropdown-menu');
                if (dropdownMenu) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });

        // Manual Dropdown Toggle for Currency Switcher (if Bootstrap JS fails)
        document.querySelectorAll('.currency-toggle-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const menu = this.nextElementSibling;
                const isShowing = menu.classList.contains('show');
                
                // Close all others
                document.querySelectorAll('.currency-switcher .dropdown-menu').forEach(m => m.classList.remove('show'));
                
                if (!isShowing) {
                    menu.classList.add('show');
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            document.querySelectorAll('.currency-switcher .dropdown-menu').forEach(m => m.classList.remove('show'));
        });

        // Apply saved currency on load
        if (typeof window.exchangeRates !== 'undefined') {
            applyCurrency(window.currentCurrency || localStorage.getItem('selectedCurrency') || 'INR');
        }
    </script>

<?php include 'includes/footer.php'; ?>