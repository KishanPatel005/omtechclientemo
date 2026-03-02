<?php include 'includes/header.php'; ?>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            <!-- Top Bar (Utility & Control) -->
            <div class="top-bar pt-3 pb-3" style="border-bottom: 1px solid #eaeaea; background: #fff;">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="search-container d-flex align-items-center justify-content-center gap-2 w-100">
                                <form action="products.php" method="GET" class="search-form position-relative flex-grow-1" style="max-width: 600px;">
                                    <input type="text" name="search" class="form-control border-dark shadow-sm" style="border-radius: 30px; padding: 10px 45px 10px 20px; font-size: 15px; height: 44px; background: #fff; width: 100%;" placeholder="Search products..." value="<?php echo $_GET['search'] ?? ''; ?>">
                                    <button type="submit" class="search-btn position-absolute" style="right: 4px; top: 4px; bottom: 4px; border: none; background: #FF5F1F; color: white; width: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease;">
                                        <i class="fas fa-search"></i> 
                                    </button>
                                </form>
                                <button class="btn btn-dark"
        onclick="resetAllFilters()"
        title="Reset Filters"
        style="
            border-radius: 30px;
            height: 44px;
            padding: 0 15px;
            font-size: 14px;
            white-space: nowrap;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
        ">
    <i class="fas fa-sync-alt me-1"></i>
    <span class="d-none d-sm-inline">Reset All</span>
    <span class="d-inline d-sm-none">Reset</span>
</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Mobile Filter Button (visible on mobile and tablet) -->
            <div class="container-fluid d-lg-none d-md-block d-block border-bottom bg-light" style="padding-top: 5px; padding-bottom: 5px;">
                <div class="row">
                    <div class="col-12 p-2 d-flex align-items-center justify-content-between gap-2 flex-nowrap">
                        <button class="btn btn-outline-primary flex-grow-1 text-center" style="border-radius: 6px; font-weight: 600; padding: 6px 10px; font-size: 14px;" type="button" onclick="openMobileFilter()">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                        
                        <div class="currency-switcher position-relative dropdown-container flex-shrink-0">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-dark dropdown-toggle currency-toggle-btn" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false" style="font-weight: 600; padding: 6px 10px; border-radius: 6px; white-space: nowrap; font-size: 14px;">
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
                </div>
            </div>
            
            <!-- Main Content Area -->
            <div class="shop-page-wrapper section-space--ptb_30 pt-1 pt-lg-4">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Left Sidebar (Technical Filters) - Hidden on mobile/tablet -->
                        <div class="col-lg-3 d-none d-lg-block">
                            <div class="sidebar-wrap" style="position: sticky; top: 20px; max-height: calc(100vh - 40px); overflow-y: auto; padding-right: 10px;">
                                
                                <!-- Category Accordion -->
                                <div class="widget widget_categories" style="padding: 15px;">
                                    <h5 class="widget-title">Product Categories</h5>
                                    <ul class="category-list">
                                        <?php
                                        include 'includes/conneaction.php';
                                        $categories_query = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' ORDER BY priority ASC, category_name ASC");
                                        while ($cat = mysqli_fetch_assoc($categories_query)) {
                                            $sub_query = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = " . $cat['id'] . " AND status = 'active'");
                                            $has_sub = mysqli_num_rows($sub_query) > 0;
                                            
                                            echo '<li class="cat-item' . ($has_sub ? ' has-children' : '') . '">';
                                            echo '<div class="cat-header">';
                                            echo '<a href="products.php?cat=' . $cat['id'] . '" class="cat-link">' . htmlspecialchars($cat['category_name']) . '</a>';
                                            if ($has_sub) {
                                                echo '<span class="toggle-icon"><i class="fas fa-plus"></i></span>';
                                            }
                                            echo '</div>';
                                            
                                            if ($has_sub) {
                                                echo '<ul class="children" style="display: none;">';
                                                while ($sub = mysqli_fetch_assoc($sub_query)) {
                                                    echo '<li>';
                                                    echo '<div class="cat-header">';
                                                    echo '<a href="products.php?sub=' . $sub['id'] . '">' . htmlspecialchars($sub['sub_category_name']) . '</a>';
                                                    echo '</div>';
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            echo '</li>';
                                        }
                                        ?>
                                    </ul>
                                    <style>
                                        .sidebar-wrap::-webkit-scrollbar { width: 5px; }
                                        .sidebar-wrap::-webkit-scrollbar-track { background: #f1f1f1; }
                                        .sidebar-wrap::-webkit-scrollbar-thumb { background: #FF5F1F; border-radius: 10px; }
                                        .category-list, .category-list ul { list-style: none; padding-left: 0; }
                                        .cat-header { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #f0f0f0; }
                                        .cat-link { color: #333; font-weight: 500; text-decoration: none; flex-grow: 1; }
                                        .toggle-icon { cursor: pointer; padding: 5px 10px; color: #FF5F1F; transition: transform 0.3s; }
                                        .cat-item.active > .cat-header .toggle-icon i:before { content: "\f068"; }
                                        .cat-item.active > .children { display: block !important; }
                                        .children li { padding-left: 15px; }
                                        
                                        @media (max-width: 575px) {
                                            .toolbar-sorter {
                                                flex-direction: column !important;
                                                gap: 15px !important;
                                                width: 50%;
                                            }
                                            .currency-switcher, .toolbar-sorter > div, .toolbar-sorter button {
                                                width: 60%;
                                                justify-content: center !important;
                                            }
                                            .currency-switcher .btn-group {
                                                width: 50%;
                                                display: flex;
                                            }
                                            .currency-switcher .btn-group .btn {
                                                flex: 1;
                                            }
                                        }
                                    </style>
                                </div>
                                
                                <!-- Price Filter -->
                                <div class="widget widget_price_filter">
                                    <h5 class="widget-title">Price Range</h5>
                                    <div class="price-filter__single">
                                        <form action="products.php" method="GET">
                                            <?php if(isset($_GET['cat'])): ?><input type="hidden" name="cat" value="<?php echo $_GET['cat']; ?>"><?php endif; ?>
                                            <?php if(isset($_GET['sub'])): ?><input type="hidden" name="sub" value="<?php echo $_GET['sub']; ?>"><?php endif; ?>
                                            <?php if(isset($_GET['brand'])): ?><input type="hidden" name="brand" value="<?php echo $_GET['brand']; ?>"><?php endif; ?>
                                            
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min" value="<?php echo $_GET['min_price'] ?? ''; ?>">
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max" value="<?php echo $_GET['max_price'] ?? ''; ?>">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm w-100" style="background: #FF5F1F;">Apply Filter</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Brand Filter -->
                                <div class="widget widget_brand">
                                    <h5 class="widget-title">Brands</h5>
                                    <ul class="brand-list">
                                        <li><a href="products.php<?php echo isset($_GET['cat']) ? '?cat='.$_GET['cat'] : ''; ?>">All Brands</a></li>
                                        <?php
                                        $brands_query = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND brand_name != '' AND status = 'active'");
                                        while ($b = mysqli_fetch_assoc($brands_query)) {
                                            $active_class = (isset($_GET['brand']) && $_GET['brand'] == $b['brand_name']) ? 'style="color: #FF5F1F; font-weight: bold;"' : '';
                                            $url = "products.php?brand=" . urlencode($b['brand_name']);
                                            if(isset($_GET['cat'])) $url .= "&cat=".$_GET['cat'];
                                            echo '<li><a href="'.$url.'" '.$active_class.'>' . htmlspecialchars($b['brand_name']) . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- Mobile Filters Drawer (Full Screen) -->
                        <div id="mobileFilterDrawer" class="mobile-filter-drawer">
                            <div class="filter-drawer-header">
                                <span class="filter-drawer-title">Filters</span>
                                <button class="filter-drawer-close" onclick="closeMobileFilter()">&times;</button>
                            </div>
                            <div class="filter-drawer-body">
                                <div class="filter-drawer-content">
                                    <div class="filter-categories">
                                        <div class="filter-category-item active" data-category="category">Category</div>
                                        <div class="filter-category-item" data-category="brand">Brand</div>
                                        <div class="filter-category-item" data-category="price">Price Range</div>
                                    </div>
                                    <div class="filter-options">
                                        <div class="filter-options-content w-100" id="filter-options-category">
                                            <ul class="mobile-category-list w-100" style="list-style: none; padding: 0;">
                                                <?php
                                                $m_categories_query = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' ORDER BY priority ASC, category_name ASC");
                                                while ($m_cat = mysqli_fetch_assoc($m_categories_query)) {
                                                    $m_sub_query = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = " . $m_cat['id'] . " AND status = 'active'");
                                                    $m_has_sub = mysqli_num_rows($m_sub_query) > 0;
                                                    
                                                    echo '<li class="mobile-cat-item' . ($m_has_sub ? ' has-children' : '') . '">';
                                                    echo '<div class="mobile-cat-header d-flex justify-content-between align-items-center py-2 border-bottom">';
                                                    echo '<a href="products.php?cat=' . $m_cat['id'] . '" class="mobile-cat-link text-decoration-none ' . (isset($_GET['cat']) && $_GET['cat'] == $m_cat['id'] ? 'selected' : '') . '" data-type="cat" data-id="' . $m_cat['id'] . '">' . htmlspecialchars($m_cat['category_name']) . '</a>';
                                                    if ($m_has_sub) {
                                                        echo '<span class="mobile-toggle-icon px-2" style="color: #FF5F1F; cursor: pointer;"><i class="fas fa-plus"></i></span>';
                                                    }
                                                    echo '</div>';
                                                    
                                                    if ($m_has_sub) {
                                                        echo '<ul class="mobile-sub-children" style="display: none; list-style: none; padding-left: 15px;">';
                                                        while ($m_sub = mysqli_fetch_assoc($m_sub_query)) {
                                                            echo '<li>';
                                                            echo '<div class="mobile-cat-header d-flex justify-content-between align-items-center py-2 border-bottom">';
                                                            echo '<a href="products.php?sub=' . $m_sub['id'] . '" class="text-decoration-none ' . (isset($_GET['sub']) && $_GET['sub'] == $m_sub['id'] ? 'selected' : '') . '" data-type="sub" data-id="' . $m_sub['id'] . '" style="font-size: 0.95em; color: #555;">' . htmlspecialchars($m_sub['sub_category_name']) . '</a>';
                                                            echo '</div>';
                                                            echo '</li>';
                                                        }
                                                        echo '</ul>';
                                                    }
                                                    echo '</li>';
                                                }
                                                ?>
                                            </ul>
                                            <style>
                                                .mobile-cat-link.selected, 
                                                .mobile-sub-children a.selected {
                                                    color: #FF5F1F !important;
                                                    font-weight: bold;
                                                }
                                                .mobile-cat-link { color: #333; font-weight: 500; }
                                            </style>
                                        </div>
                                        <div class="filter-options-content" id="filter-options-brand" style="display: none;">
                                            <?php
                                            $m_brand_query = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND status = 'active'");
                                            while($m_brand = mysqli_fetch_assoc($m_brand_query)):
                                            ?>
                                            <a href="products.php?brand=<?php echo urlencode($m_brand['brand_name']); ?>" 
                                               class="filter-pill <?php echo (isset($_GET['brand']) && $_GET['brand'] == $m_brand['brand_name']) ? 'selected' : ''; ?>"
                                               data-brand="<?php echo htmlspecialchars($m_brand['brand_name']); ?>">
                                                <?php echo htmlspecialchars($m_brand['brand_name']); ?>
                                            </a>
                                            <?php endwhile; ?>
                                        </div>
                                        <div class="filter-options-content" id="filter-options-price" style="display: none;">
                                            <form action="products.php" method="GET" class="w-100 p-2">
                                                <?php foreach($_GET as $key => $val): if(!in_array($key, ['min_price', 'max_price', 'page'])): ?>
                                                    <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>">
                                                <?php endif; endforeach; ?>
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <label class="form-label small">Min Price</label>
                                                        <input type="number" name="min_price" class="form-control" placeholder="0" value="<?php echo $_GET['min_price'] ?? ''; ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label small">Max Price</label>
                                                        <input type="number" name="max_price" class="form-control" placeholder="100000" value="<?php echo $_GET['max_price'] ?? ''; ?>">
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-primary w-100" style="background: #FF5F1F;">Apply Price Filter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-drawer-footer">
                                <button class="btn btn-primary w-100 filter-apply-btn"
                                        style="display: flex; justify-content: center; align-items: center;"
                                        onclick="applyMobileFilters()">
                                    SHOW RESULTS
                                </button>
                            </div>
                        </div>
                        
                        <!-- Main Product List -->
                        <div class="col-lg-9">
                            <?php
                            // ================================================================
                            // DETERMINE BROWSE STATE
                            // State 1: No cat/sub/search filter => show all Main Categories grid
                            // State 2: cat selected => check if it has subs
                            //    2a: Has subs => show Subcategory grid
                            //    2b: No subs  => show products directly
                            // State 3: sub selected => show products
                            // Search active => always show products
                            // ================================================================

                            $show_products   = false;
                            $show_categories = false;
                            $show_subcat     = false;
                            $browse_title    = '';
                            $selected_cat_id = null;
                            $selected_sub_id = null;

                            $has_search = !empty($_GET['search']);
                            $has_brand  = !empty($_GET['brand']);
                            $has_price  = !empty($_GET['min_price']) || !empty($_GET['max_price']);

                            if ($has_search || $has_brand || $has_price) {
                                // Any filter active => show products
                                $show_products = true;
                            } elseif (isset($_GET['sub'])) {
                                $selected_sub_id = (int)$_GET['sub'];
                                $show_products = true;
                            } elseif (isset($_GET['cat'])) {
                                $selected_cat_id = (int)$_GET['cat'];
                                // Check if this category has subcategories
                                $sub_check = mysqli_query($con, "SELECT id FROM sub_categories WHERE category_id = $selected_cat_id AND status = 'active' LIMIT 1");
                                if (mysqli_num_rows($sub_check) > 0) {
                                    $show_subcat = true; // Show subcategory grid
                                } else {
                                    $show_products = true; // Skip to products
                                }
                            } else {
                                $show_categories = true; // Step 1: show main categories grid
                            }
                            ?>

                            <!-- ======================== STEP 1: MAIN CATEGORIES GRID ======================== -->
                            <?php if ($show_categories): ?>
                            <div class="browse-header mb-4">
                                <h4 class="browse-title">Browse by Category</h4>
                                <p class="browse-subtitle text-muted">Select a category to explore products</p>
                            </div>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 g-lg-4">
                                <?php
                                $all_cats = mysqli_query($con, "SELECT * FROM categories WHERE status = 'active' ORDER BY priority ASC, category_name ASC");
                                while ($cat_item = mysqli_fetch_assoc($all_cats)):
                                    $cat_img = !empty($cat_item['category_image']) ? $cat_item['category_image'] : 'https://picsum.photos/seed/cat'.$cat_item['id'].'/400/400';
                                ?>
                                <div class="col">
                                    <a href="products.php?cat=<?php echo $cat_item['id']; ?>" class="category-browse-card text-decoration-none d-block">
                                        <div class="cat-card-inner">
                                            <div class="cat-card-img-wrap">
                                                <img src="<?php echo htmlspecialchars($cat_img); ?>" alt="<?php echo htmlspecialchars($cat_item['category_name']); ?>" class="cat-card-img">
                                            </div>
                                            <div class="cat-card-name"><?php echo htmlspecialchars($cat_item['category_name']); ?></div>
                                        </div>
                                    </a>
                                </div>
                                <?php endwhile; ?>
                            </div>

                            <!-- ======================== STEP 2: SUBCATEGORIES GRID ======================== -->
                            <?php elseif ($show_subcat): ?>
                            <?php
                            $cat_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM categories WHERE id = $selected_cat_id"));
                            ?>
                            <div class="browse-header mb-4 d-flex align-items-center gap-3">
                                <a href="products.php" class="btn btn-sm btn-outline-dark back-btn"><i class="fas fa-arrow-left me-1"></i> All Categories</a>
                                <div>
                                    <h4 class="browse-title mb-0"><?php echo htmlspecialchars($cat_info['category_name']); ?></h4>
                                    <p class="browse-subtitle text-muted mb-0 small">Select a subcategory</p>
                                </div>
                            </div>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3 g-lg-4">
                                <?php
                                $all_subs = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = $selected_cat_id AND status = 'active' ORDER BY sub_category_name ASC");
                                while ($sub_item = mysqli_fetch_assoc($all_subs)):
                                    $sub_img = !empty($sub_item['image']) ? $sub_item['image'] : 'https://picsum.photos/seed/sub'.$sub_item['id'].'/400/400';
                                ?>
                                <div class="col">
                                    <a href="products.php?sub=<?php echo $sub_item['id']; ?>" class="category-browse-card text-decoration-none d-block">
                                        <div class="cat-card-inner">
                                            <div class="cat-card-img-wrap">
                                                <img src="<?php echo htmlspecialchars($sub_img); ?>" alt="<?php echo htmlspecialchars($sub_item['sub_category_name']); ?>" class="cat-card-img">
                                            </div>
                                            <div class="cat-card-name"><?php echo htmlspecialchars($sub_item['sub_category_name']); ?></div>
                                        </div>
                                    </a>
                                </div>
                                <?php endwhile; ?>
                            </div>

                            <!-- ======================== STEP 3: PRODUCTS ======================== -->
                            <?php elseif ($show_products): ?>

                            <!-- Breadcrumb back navigation -->
                            <div class="mb-3 d-flex align-items-center gap-2 flex-wrap">
                                <a href="products.php" class="btn btn-sm btn-outline-dark back-btn"><i class="fas fa-arrow-left me-1"></i> Categories</a>
                                <?php if ($selected_sub_id): ?>
                                    <?php $sub_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT sc.*, c.id as cid FROM sub_categories sc JOIN categories c ON sc.category_id = c.id WHERE sc.id = $selected_sub_id")); ?>
                                    <?php if ($sub_info): ?>
                                        <a href="products.php?cat=<?php echo $sub_info['cid']; ?>" class="btn btn-sm btn-outline-secondary back-btn"><i class="fas fa-folder me-1"></i><?php echo htmlspecialchars($sub_info['category_name'] ?? ''); ?></a>
                                        <span class="text-muted small">&rsaquo; <?php echo htmlspecialchars($sub_info['sub_category_name']); ?></span>
                                    <?php endif; ?>
                                <?php elseif ($selected_cat_id): ?>
                                    <?php $cat_info_b = mysqli_fetch_assoc(mysqli_query($con, "SELECT category_name FROM categories WHERE id = $selected_cat_id")); ?>
                                    <?php if ($cat_info_b): ?>
                                        <span class="text-muted small">&rsaquo; <?php echo htmlspecialchars($cat_info_b['category_name']); ?></span>
                                    <?php endif; ?>
                                <?php elseif ($has_search): ?>
                                    <span class="text-muted small">&rsaquo; Search results for "<?php echo htmlspecialchars($_GET['search']); ?>"</span>
                                <?php endif; ?>
                            </div>

                            <div class="shop-toolbar-wrap mb-3 px-2 px-lg-0 mt-1 mt-lg-0">
                                <div class="d-flex align-items-center justify-content-between gap-2 flex-nowrap w-100">
                                    <div class="toolbar-result flex-shrink-1 text-truncate" style="font-size: 13px; font-weight: 500; color: #555; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?php
                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $limit = 12;
                                        $offset = ($page - 1) * $limit;

                                        $where = " WHERE status = 'active' ";

                                        if ($selected_sub_id) {
                                            $where .= " AND sub_category_id = $selected_sub_id ";
                                        } elseif ($selected_cat_id) {
                                            $where .= " AND category_id = $selected_cat_id AND (sub_category_id IS NULL OR sub_category_id = 0) ";
                                        }

                                        if (isset($_GET['brand']) && !empty($_GET['brand'])) {
                                            $brand_name = mysqli_real_escape_string($con, $_GET['brand']);
                                            $where .= " AND brand_name = '$brand_name' ";
                                        }
                                        if (isset($_GET['min_price']) && $_GET['min_price'] !== '') {
                                            $min = (float)$_GET['min_price'];
                                            $where .= " AND price >= $min ";
                                        }
                                        if (isset($_GET['max_price']) && $_GET['max_price'] !== '') {
                                            $max = (float)$_GET['max_price'];
                                            $where .= " AND price <= $max ";
                                        }
                                        if (isset($_GET['search']) && !empty($_GET['search'])) {
                                            $search = mysqli_real_escape_string($con, $_GET['search']);
                                            $where .= " AND (product_name LIKE '%$search%' OR sku LIKE '%$search%' OR brand_name LIKE '%$search%') ";
                                        }

                                        $sort = $_GET['sort'] ?? 'latest';
                                        $order_by = " ORDER BY id DESC ";
                                        if ($sort == 'price_low') $order_by = " ORDER BY price ASC ";
                                        if ($sort == 'price_high') $order_by = " ORDER BY price DESC ";

                                        $total_res = mysqli_query($con, "SELECT COUNT(*) as total FROM products $where");
                                        $total_row = mysqli_fetch_assoc($total_res);
                                        $total_products = $total_row['total'];
                                        $total_pages = ceil($total_products / $limit);

                                        $prod_res = mysqli_query($con, "SELECT * FROM products $where $order_by LIMIT $limit OFFSET $offset");
                                        ?>
                                        <p class="mb-0 text-truncate">Showing <?php echo mysqli_num_rows($prod_res); ?> of <?php echo $total_products; ?></p>
                                    </div>
                                    <div class="toolbar-sorter d-flex align-items-center gap-2 flex-shrink-0">
                                        <div class="currency-switcher d-none d-lg-flex align-items-center position-relative dropdown-container flex-shrink-0">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-dark dropdown-toggle currency-toggle-btn" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false" style="font-weight: 600; padding: 6px 15px;">
                                                    <i class="fas fa-coins me-1"></i> <span class="currency-label">INR</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 100px;">
                                                    <li><button class="dropdown-item currency-option active" type="button" data-currency="INR">INR</button></li>
                                                    <li><button class="dropdown-item currency-option" type="button" data-currency="USD">USD</button></li>
                                                    <li><button class="dropdown-item currency-option" type="button" data-currency="EUR">EUR</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            <label class="me-1 mb-0 d-none d-sm-inline fw-semibold" style="font-size: 13px;">Sort:</label>
                                            <select class="form-select border border-dark border-opacity-25 shadow-sm" style="border-radius: 4px; padding: 4px 25px 4px 10px; font-size: 13px; height: auto; min-width: 110px;" onchange="location = this.value;">
                                                <?php
                                                function getSortUrl($s) {
                                                    $p = $_GET;
                                                    $p['sort'] = $s;
                                                    return 'products.php?' . http_build_query($p);
                                                }
                                                ?>
                                                <option value="<?php echo getSortUrl('latest'); ?>" <?php echo $sort == 'latest' ? 'selected' : ''; ?>>Latest</option>
                                                <option value="<?php echo getSortUrl('price_low'); ?>" <?php echo $sort == 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                                                <option value="<?php echo getSortUrl('price_high'); ?>" <?php echo $sort == 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-product-wrap grid" style="max-width: 100%;">
                                <div class="prod-grid row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2 g-md-3">
                                    <?php
                                    if (mysqli_num_rows($prod_res) > 0) {
                                        while ($prod = mysqli_fetch_assoc($prod_res)) {
                                            ?>
                                            <div class="col mb-3">
                                                <!-- Product Grid Card -->
                                                <div class="product-grid-card h-100 d-flex flex-column" style="border: 1px solid #FF5F1F; background: #fff; border-radius: 12px; transition: all 0.3s ease; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.04);">
                                                    <div class="product-image-wrapper" style="position: relative; aspect-ratio: 0/0; background: #f9f9f9; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                                        <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="w-100 h-100 d-flex align-items-center justify-content: center">
                                                            <img src="<?php echo $prod['image1']; ?>" alt="<?php echo htmlspecialchars($prod['product_name']); ?>" style="width: 100%; height: 100%; object-fit: contain;">
                                                        </a>
                                                        <div class="sku-tag" style="position: absolute; top: 10px; right: 10px; font-size: 8px; background: rgba(255,255,255,0.9); padding: 2px 6px; border-radius: 4px; border: 1px solid #efefef; z-index: 1;">SKU: <?php echo htmlspecialchars($prod['sku']); ?></div>
                                                    </div>
                                                    
                                                    <div class="product-details-content p-3 flex-grow-1 d-flex flex-column" style="background: #fff;">
                                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                                            <div class="brand-label">
                                                                <span class="text-primary fw-bold" style="font-size: 10px; text-transform: uppercase; letter-spacing: 0.8px;"><?php echo htmlspecialchars($prod['brand_name']); ?></span>
                                                            </div>
                                                            <div class="stock-status-badge">
                                                                <?php
                                                                $status = $prod['stock_status'];
                                                                $badge_style = 'background: #28a745; color: #fff;';
                                                                if ($status == 'Limited Stock') $badge_style = 'background: #ffc107; color: #000;';
                                                                if ($status == 'Out of Stock') $badge_style = 'background: #dc3545; color: #fff;';
                                                                ?>
                                                                <span style="font-size: 8px; font-weight: 700; padding: 2px 6px; border-radius: 10px; text-transform: uppercase; <?php echo $badge_style; ?>">
                                                                    <?php echo $status; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <h6 class="product-name-heading mb-2" style="font-size: 13.5px; line-height: 1.4; height: 38px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; margin-top: 2px;">
                                                            <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="text-decoration-none text-dark hover-blue"><?php echo htmlspecialchars($prod['product_name']); ?></a>
                                                        </h6>
                                                        <div class="mt-auto mb-3 d-flex justify-content-between align-items-center" style="gap: 5px;">
                                                            <div class="price-section d-flex flex-column text-start">
                                                                <?php if (isset($prod['mrp']) && $prod['mrp'] > $prod['price']): ?>
                                                                    <span class="mrp-val text-muted" style="text-decoration: line-through; font-size: 12px; line-height: 1;">Rs. <?php echo number_format($prod['mrp'], 2); ?></span>
                                                                <?php endif; ?>
                                                                <div class="current-price-val d-inline-block mt-1" data-base-price="<?php echo $prod['price']; ?>" style="font-weight: 800; font-size: 16px; color: #FF5F1F;">Rs. <?php echo number_format($prod['price'], 2); ?></div>
                                                            </div>

                                                            <!-- Quantity Selector -->
                                                            <div class="quantity-wrapper d-flex justify-content-center">
                                                                <div class="quantity-input d-flex align-items-center" style="border: 1px solid #ddd; border-radius: 4px; overflow: hidden; height: 32px;">
                                                                    <button class="qty-btn quantity-decrease" style="border: none; background: #f8f9fa; padding: 0 8px; font-weight: bold; height: 100%;">-</button>
                                                                    <input type="number" min="1" value="1" class="quantity-number text-center" style="width: 35px; border: none; font-size: 12px; font-weight: 600; background: transparent; -moz-appearance: textfield; height: 100%;">
                                                                    <button class="qty-btn quantity-increase" style="border: none; background: #f8f9fa; padding: 0 8px; font-weight: bold; height: 100%;">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="grid-actions-group">
                                                            <div class="d-flex gap-2">
                                                                <button type="button" class="btn btn-primary btn-sm flex-grow-1 py-2 d-flex align-items-center justify-content-center gap-1 w-50" 
                                                                         style="background: #FF5F1F; border: none; font-size: 11px; font-weight: 700; border-radius: 6px;" 
                                                                         onclick="addToCart({
                                                                             id: <?php echo (int)$prod['id']; ?>, 
                                                                             title: '<?php echo addslashes($prod['product_name']); ?>', 
                                                                             sku: '<?php echo addslashes($prod['sku']); ?>', 
                                                                             price: <?php echo (float)$prod['price']; ?>, 
                                                                             image: '<?php echo addslashes($prod['image1']); ?>', 
                                                                             qty: this.closest('.product-details-content').querySelector('.quantity-number').value
                                                                         })">
                                                                     <i class="fas fa-shopping-cart"></i> <span class="d-none d-sm-inline">ADD TO CART</span><span class="d-inline d-sm-none">CART</span>
                                                                 </button>
                                                                <a href="product-details.php?id=<?php echo $prod['id']; ?>" class="btn btn-warning btn-sm flex-grow-1 py-2 d-flex align-items-center justify-content-center gap-1 w-50" style="background: #0B0B45; color: #fff; border: none; font-size: 11px; font-weight: 700; border-radius: 6px;">
                                                                    <i class="fas fa-bolt"></i> BUY NOW
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo "<div class='col-12 text-center'><div class='alert alert-info py-4'>No products found matching your criteria.</div></div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <style>

                                /* ── Product Grid Layout ───────────────────────────── */
                                .shop-product-wrap .prod-grid { width: 100%; }

                                /* ── Card Base ─────────────────────────────────────── */
                                .product-grid-card {
                                    border: 1px solid #eee;
                                    background: #fff;
                                    border-radius: 10px;
                                    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
                                    overflow: hidden;
                                    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
                                    display: flex;
                                    flex-direction: column;
                                    height: 100%;
                                }
                                .product-grid-card:hover {
                                    transform: translateY(-4px);
                                    box-shadow: 0 10px 28px rgba(0,0,0,0.09) !important;
                                    border-color: #FF5F1F !important;
                                }

                                /* ── Product Image ──────────────────────────────────── */
                                .product-image-wrapper {
                                    position: relative;
                                    width: 100%;
                                    padding-top: 80%;          /* 5:4 aspect ratio — image fills the box */
                                    background: #f9f9f9;
                                    overflow: hidden;
                                }
                                .product-image-wrapper a {
                                    position: absolute;
                                    inset: 0;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 8px;
                                }
                                .product-image-wrapper img {
                                    width: 100%;
                                    height: 100%;
                                    object-fit: contain;
                                }

                                /* ── Card Body ──────────────────────────────────────── */
                                .product-details-content {
                                    padding: 10px 10px 10px !important;
                                    flex: 1;
                                    display: flex;
                                    flex-direction: column;
                                }

                                /* ── Brand + Stock row ──────────────────────────────── */
                                .product-details-content .brand-label span {
                                    font-size: 9px;
                                }
                                .product-details-content .stock-status-badge span {
                                    font-size: 8px;
                                    white-space: nowrap;
                                }

                                /* ── Product Title ──────────────────────────────────── */
                                .product-name-heading {
                                    font-size: 12px !important;
                                    line-height: 1.4;
                                    margin-top: 4px;
                                    margin-bottom: 8px !important;
                                    /* clamp to 2 lines, no overflow */
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                    height: auto;   /* let clamp handle it */
                                    min-height: 2.8em;
                                }
                                .hover-blue:hover { color: #FF5F1F !important; }

                                /* ── Price Row ──────────────────────────────────────── */
                                .price-qty-row {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    gap: 6px;
                                    margin-top: auto;
                                    margin-bottom: 8px;
                                    flex-wrap: wrap;
                                }
                                .price-section .mrp-val {
                                    font-size: 10px !important;
                                }
                                .price-section .current-price-val {
                                    font-size: 14px !important;
                                    font-weight: 800;
                                    color: #FF5F1F;
                                    white-space: nowrap;
                                }

                                /* ── Quantity Widget ────────────────────────────────── */
                                .quantity-input {
                                    border: 2px solid #FF5F1F !important;
                                    border-radius: 6px !important;
                                    overflow: hidden;
                                    display: flex;
                                    align-items: center;
                                    height: 30px;
                                }
                                .quantity-input .qty-btn {
                                    background: #FF5F1F !important;
                                    color: #fff !important;
                                    border: none !important;
                                    width: 26px;
                                    min-width: 26px;
                                    height: 100%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-weight: bold;
                                    font-size: 14px;
                                    padding: 0;
                                    flex-shrink: 0;
                                }
                                .quantity-input .qty-btn:hover { background: #0B0B45 !important; }
                                .quantity-number {
                                    width: 28px !important;
                                    border: none !important;
                                    text-align: center;
                                    font-weight: 700;
                                    font-size: 12px;
                                    background: transparent;
                                    -moz-appearance: textfield;
                                    height: 100%;
                                }

                                /* ── Action Buttons ─────────────────────────────────── */
                                .grid-actions-group .d-flex {
                                    gap: 6px;
                                }
                                .grid-actions-group .btn {
                                    font-size: 10px !important;
                                    font-weight: 700;
                                    border-radius: 6px;
                                    padding: 6px 4px !important;
                                    white-space: nowrap;
                                    min-width: 0;
                                    flex: 1 1 0;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    gap: 3px;
                                }

                                /* ── Mobile overrides (< 576px — 2-col layout) ──────── */
                                @media (max-width: 575px) {
                                    /* Tighter card padding */
                                    .product-details-content {
                                        padding: 8px 8px 8px !important;
                                    }
                                    /* Smaller title on very small phones */
                                    .product-name-heading {
                                        font-size: 11px !important;
                                        min-height: 2.6em;
                                    }
                                    /* Price */
                                    .price-section .current-price-val {
                                        font-size: 12px !important;
                                    }
                                    /* Qty buttons smaller */
                                    .quantity-input { height: 26px; }
                                    .quantity-input .qty-btn { width: 22px; min-width: 22px; font-size: 12px; }
                                    .quantity-number { width: 22px !important; font-size: 11px; }
                                    /* Buttons: show icon only on very small screens */
                                    .grid-actions-group .btn {
                                        font-size: 9px !important;
                                        padding: 5px 2px !important;
                                    }
                                    .grid-actions-group .btn-text-label { display: none; }
                                    /* SKU tag */
                                    .sku-tag { font-size: 7px !important; padding: 1px 4px !important; }
                                    /* Card gap is g-2  (set on row) — already done */
                                }

                                /* ── Tablet 3-col (md) tweaks ───────────────────────── */
                                @media (min-width: 576px) and (max-width: 991px) {
                                    .product-name-heading { font-size: 12px !important; }
                                    .price-section .current-price-val { font-size: 13px !important; }
                                    .grid-actions-group .btn { font-size: 10px !important; }
                                }

                            </style>
                            
                            <!-- Pagination -->
                            <div class="page-pagination section-space--mt_60 text-center">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <?php if($page > 1): ?>
                                            <li class="page-item"><a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $page - 1; echo http_build_query($p); ?>"><i class="fas fa-chevron-left"></i></a></li>
                                        <?php endif; ?>
                                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                                            <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                                <a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $i; echo http_build_query($p); ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                        <?php if($page < $total_pages): ?>
                                            <li class="page-item"><a class="page-link" href="products.php?<?php $p = $_GET; $p['page'] = $page + 1; echo http_build_query($p); ?>"><i class="fas fa-chevron-right"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                            
                            <?php endif; /* end show_products */ ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <style>
        /* ===== Category & Subcategory Browse Grid ===== */
        .browse-title { font-size: 22px; font-weight: 700; color: #222; }
        .browse-subtitle { font-size: 14px; }
        .back-btn { font-size: 12px; font-weight: 600; border-radius: 20px; }

        .category-browse-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .category-browse-card:hover { transform: translateY(-5px); }
        .category-browse-card:hover .cat-card-inner {
            box-shadow: 0 12px 30px rgba(255, 95, 31, 0.18);
            border-color: #FF5F1F;
        }
        .cat-card-inner {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            overflow: hidden;
            transition: all 0.25s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .cat-card-img-wrap {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #f8f8f8;
        }
        .cat-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .category-browse-card:hover .cat-card-img { transform: scale(1.07); }
        .cat-card-name {
            padding: 10px 8px;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            line-height: 1.3;
            border-top: 1px solid #f0f0f0;
            background: #fff;
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Overall Page Improvements */
        .shop-page-wrapper { background-color: #fbfbfb; }
        .sidebar-wrap { padding-right: 20px; }
        .widget {
            margin-bottom: 40px; padding: 20px; background: #fff;
            border: 1px solid #f0f0f0; border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .widget-title {
            font-size: 18px; font-weight: 700; margin-bottom: 20px;
            padding-bottom: 10px; border-bottom: 2px solid #FF5F1F;
            color: #333; text-transform: uppercase; letter-spacing: 1px; text-align: center;
        }
        .category-list, .brand-list { list-style: none; padding: 0; margin: 0; }
        .category-list li, .brand-list li { margin-bottom: 12px; }
        .category-list li a, .brand-list li a {
            color: #555; text-decoration: none; transition: all 0.3s ease;
            display: block; font-size: 15px;
        }
        .category-list li a:hover, .brand-list li a:hover { color: #FF5F1F; padding-left: 5px; }
        .children { list-style: none; padding-left: 20px; margin-top: 8px; border-left: 1px solid #eee; }
        .children li { margin-bottom: 8px; }
        .children li a { font-size: 14px; color: #777; }

        /* Quantity */
        .quantity-input { border: 2px solid #FF5F1F !important; border-radius: 8px !important; overflow: hidden; background: #fff; display: flex; align-items: center; }
        .quantity-input .qty-btn { background: #FF5F1F !important; color: #fff !important; border: none !important; width: 25px; height: 32px; display: flex; align-items: center; justify-content: center; font-weight: bold; transition: all 0.2s; padding: 0; }
        .quantity-input .qty-btn:hover { background: #0B0B45 !important; }
        .quantity-number { width: 45px; border: none !important; text-align: center; font-weight: 700; color: #333; font-size: 14px; }
        
        /* Mobile Filter */
        .mobile-filter-drawer { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: #fff; z-index: 9999; flex-direction: column; }
        .mobile-filter-drawer.active { display: flex; }
        .filter-drawer-header { display: flex; justify-content: space-between; align-items: center; padding: 16px 20px; border-bottom: 1px solid #e0e0e0; background: #fff; flex-shrink: 0; }
        .filter-drawer-title { font-weight: 700; font-size: 18px; color: #333; }
        .filter-drawer-close { background: none; border: none; font-size: 28px; color: #666; cursor: pointer; padding: 0; line-height: 1; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; }
        .filter-drawer-close:hover { color: #333; }
        .filter-drawer-body { flex: 1; overflow: hidden; }
        .filter-drawer-content { display: flex; height: 100%; }
        .filter-categories { width: 35%; min-width: 100px; background: #f8f9fa; overflow-y: auto; border-right: 1px solid #e0e0e0; }
        .filter-category-item { padding: 14px 16px; font-size: 14px; color: #555; cursor: pointer; border-bottom: 1px solid #eee; transition: all 0.2s ease; }
        .filter-category-item:hover { background: #eee; }
        .filter-category-item.active { background: #fff; color: #FF5F1F; font-weight: 600; border-left: 3px solid #FF5F1F; }
        .filter-options { width: 65%; overflow-y: auto; padding: 16px; }
        .filter-options-content { display: flex; flex-wrap: wrap; gap: 10px; }
        .filter-pill { padding: 8px 16px; border: 1px solid #ddd; border-radius: 20px; background: #fff; color: #555; font-size: 13px; cursor: pointer; transition: all 0.2s ease; }
        .filter-pill:hover { border-color: #FF5F1F; color: #FF5F1F; }
        .filter-pill.selected { background: #FF5F1F; border-color: #FF5F1F; color: #fff; }
        .filter-drawer-footer { padding: 16px 20px; border-top: 1px solid #e0e0e0; background: #fff; flex-shrink: 0; }
        .filter-apply-btn { background-color: #FF5F1F !important; border-color: #FF5F1F !important; padding: 14px 24px; font-size: 16px; font-weight: 600; border-radius: 4px; }
        .filter-apply-btn:hover { background-color: #0B0B45 !important; border-color: #0B0B45 !important; }
        body.filter-open { overflow: hidden; }
        body.filter-open .header-area--default, body.filter-open .preloader-activate, body.filter-open .sticky-contact-wrapper { display: none !important; }
        @media (min-width: 992px) { .mobile-filter-drawer { display: none !important; } }
        html, body { overflow-x: hidden; max-width: 100%; }
        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }
    </style>

    <script>
        document.querySelectorAll('.quantity-decrease').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.quantity-input').querySelector('.quantity-number');
                let value = parseInt(input.value) || 1;
                if(value > 1) { input.value = value - 1; input.dispatchEvent(new Event('change')); }
            });
        });
        document.querySelectorAll('.quantity-increase').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.closest('.quantity-input').querySelector('.quantity-number');
                let value = parseInt(input.value) || 0;
                input.value = value + 1;
                input.dispatchEvent(new Event('change'));
            });
        });
        document.querySelectorAll('.quantity-number').forEach(input => {
            input.addEventListener('change', function() {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 1) { this.value = 1; }
            });
            input.addEventListener('keyup', function() { this.dispatchEvent(new Event('change')); });
        });
        
        function openMobileFilter() {
            document.getElementById('mobileFilterDrawer').classList.add('active');
            document.body.classList.add('filter-open');
        }
        function closeMobileFilter() {
            document.getElementById('mobileFilterDrawer').classList.remove('active');
            document.body.classList.remove('filter-open');
        }
        
        document.querySelectorAll('.filter-category-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.filter-category-item').forEach(cat => cat.classList.remove('active'));
                this.classList.add('active');
                document.querySelectorAll('.filter-options-content').forEach(panel => panel.style.display = 'none');
                const category = this.getAttribute('data-category');
                document.getElementById('filter-options-' + category).style.display = 'flex';
            });
        });

        document.querySelectorAll('#filter-options-brand .filter-pill').forEach(pill => {
            const originalHref = pill.getAttribute('href');
            pill.removeAttribute('href');
            pill.style.cursor = 'pointer';
            pill.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('#filter-options-brand .filter-pill').forEach(p => p.classList.remove('selected'));
                this.classList.toggle('selected');
            });
        });

        function setupToggles(selector) {
            document.querySelectorAll(selector).forEach(icon => {
                icon.addEventListener('click', function(e) {
                    e.preventDefault(); e.stopPropagation();
                    const li = this.closest('li');
                    const submenu = Array.from(li.children).find(child => child.tagName === 'UL');
                    const iconTag = this.querySelector('i');
                    if (submenu) {
                        if (submenu.style.display === 'none' || submenu.style.display === '') {
                            submenu.style.display = 'block';
                            iconTag.classList.remove('fa-plus'); iconTag.classList.add('fa-minus');
                            li.classList.add('active');
                        } else {
                            submenu.style.display = 'none';
                            iconTag.classList.remove('fa-minus'); iconTag.classList.add('fa-plus');
                            li.classList.remove('active');
                        }
                    }
                });
            });
        }
        setupToggles('.toggle-icon');
        setupToggles('.mobile-toggle-icon');

        function applyMobileFilters() {
            var url = new URL(window.location.href);
            url.searchParams.delete('cat'); url.searchParams.delete('sub');
            url.searchParams.delete('brand'); url.searchParams.delete('page');

            var selectedCat = document.querySelector('#filter-options-category a.selected');
            if (selectedCat && selectedCat.dataset.type) {
                url.searchParams.set(selectedCat.dataset.type, selectedCat.dataset.id);
            }
            var selectedBrand = document.querySelector('#filter-options-brand .filter-pill.selected');
            if (selectedBrand && selectedBrand.dataset.brand) {
                url.searchParams.set('brand', selectedBrand.dataset.brand);
            }
            window.location.href = url.toString();
        }

        function applyCurrency(currency) {
            const currencyRates = window.exchangeRates || { 'INR': 1, 'USD': 0.012, 'EUR': 0.011 };
            const rate = currencyRates[currency] || 1;
            const symbols = window.currencySymbols || { 'INR': 'Rs. ', 'USD': '$', 'EUR': '€' };
            const symbol = symbols[currency] || 'Rs. ';
            document.querySelectorAll('.current-price-val').forEach(el => {
                const basePrice = parseFloat(el.getAttribute('data-base-price'));
                if (!isNaN(basePrice)) {
                    const converted = basePrice * rate;
                    el.textContent = symbol + ' ' + converted.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }
            });
            document.querySelectorAll('.currency-option').forEach(btn => {
                btn.getAttribute('data-currency') === currency ? btn.classList.add('active') : btn.classList.remove('active');
            });
            document.querySelectorAll('.currency-label').forEach(lbl => lbl.textContent = currency);
            localStorage.setItem('selectedCurrency', currency);
            window.currentCurrency = currency;
            if (typeof updateCartDisplay === 'function') updateCartDisplay();
        }

        function resetAllFilters() {
            localStorage.setItem('selectedCurrency', 'INR');
            window.location.href = 'products.php';
        }

        document.querySelectorAll('.currency-option').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const currency = this.getAttribute('data-currency');
                applyCurrency(currency);
                const dropdownMenu = this.closest('.dropdown-menu');
                if (dropdownMenu) { dropdownMenu.classList.remove('show'); dropdownMenu.style.display = ''; }
            });
        });

        document.querySelectorAll('.currency-toggle-btn').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault(); e.stopPropagation();
                const container = this.closest('.dropdown-container');
                const menu = container ? container.querySelector('.dropdown-menu') : this.nextElementSibling;
                if (!menu) return;
                const isOpen = menu.classList.contains('show') || menu.style.display === 'block';
                document.querySelectorAll('.dropdown-menu').forEach(m => { m.classList.remove('show'); m.style.display = ''; });
                if (!isOpen) { menu.classList.add('show'); menu.style.display = 'block'; }
            });
        });

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-container') && !e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => { menu.classList.remove('show'); menu.style.display = ''; });
            }
        });

        const storedCurrency = localStorage.getItem('selectedCurrency') || 'INR';
        applyCurrency(storedCurrency);

        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') closeMobileFilter();
        });
    </script>

<?php include 'includes/footer.php'; ?>
