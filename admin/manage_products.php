<?php
ob_start();
include '../includes/conneaction.php';

$message = "";
$product = null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $res = mysqli_query($con, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($res);
}

if (isset($_POST['save_product'])) {
    $name        = mysqli_real_escape_string($con, $_POST['product_name']);
    $sku         = mysqli_real_escape_string($con, $_POST['sku']);
    $price       = mysqli_real_escape_string($con, $_POST['price']);
    $mrp         = mysqli_real_escape_string($con, $_POST['mrp']);
    $stock_status= mysqli_real_escape_string($con, $_POST['stock_status']);
    $brand       = mysqli_real_escape_string($con, $_POST['brand_name']);
    $cat_id      = !empty($_POST['category_id'])     ? (int)$_POST['category_id']     : 'NULL';
    $sub_cat_id  = !empty($_POST['sub_category_id']) ? (int)$_POST['sub_category_id'] : 'NULL';
    $short_desc  = mysqli_real_escape_string($con, $_POST['short_description']);
    $short_tech  = mysqli_real_escape_string($con, $_POST['short_technical_specifications']);
    $desc        = mysqli_real_escape_string($con, $_POST['description']);
    $long_spec   = mysqli_real_escape_string($con, $_POST['long_specifications']);

    $img_paths = [];
    for ($i = 1; $i <= 4; $i++) {
        $field = "image" . $i;
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] == 0) {
            $ext = pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION);
            $img_name = "prod_" . $i . "_" . time() . "_" . rand(1000, 9999) . "." . $ext;
            if (move_uploaded_file($_FILES[$field]['tmp_name'], "../uploads/products/" . $img_name)) {
                $img_paths[$i] = "uploads/products/" . $img_name;
                if ($product && !empty($product[$field]) && file_exists("../" . $product[$field])) {
                    unlink("../" . $product[$field]);
                }
            }
        } else {
            $img_paths[$i] = $product ? $product[$field] : "";
        }
    }

    if ($id) {
        $sql = "UPDATE products SET 
                product_name='$name', sku='$sku', price='$price', mrp='$mrp',
                stock_status='$stock_status', brand_name='$brand',
                category_id=$cat_id, sub_category_id=$sub_cat_id,
                short_description='$short_desc',
                short_technical_specifications='$short_tech',
                description='$desc', long_specifications='$long_spec',
                image1='{$img_paths[1]}', image2='{$img_paths[2]}',
                image3='{$img_paths[3]}', image4='{$img_paths[4]}'
                WHERE id = $id";
    } else {
        $sql = "INSERT INTO products (product_name, sku, price, mrp, stock_status, brand_name,
                category_id, sub_category_id, short_description, short_technical_specifications,
                description, long_specifications, image1, image2, image3, image4)
                VALUES ('$name', '$sku', '$price', '$mrp', '$stock_status', '$brand',
                $cat_id, $sub_cat_id, '$short_desc', '$short_tech',
                '$desc', '$long_spec',
                '{$img_paths[1]}', '{$img_paths[2]}', '{$img_paths[3]}', '{$img_paths[4]}')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: products.php?msg=success");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error saving product: " . mysqli_error($con) . "</div>";
    }
}

include 'header.php';
$categories  = mysqli_query($con, "SELECT * FROM categories ORDER BY category_name ASC");
$brands_res  = mysqli_query($con, "SELECT DISTINCT brand_name FROM products WHERE brand_name IS NOT NULL AND brand_name != ''");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0"><?php echo $id ? 'Edit' : 'Add'; ?> Product</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <form method="post" enctype="multipart/form-data">
                <div class="card card-primary">
                    <div class="card-body">
                        <!-- Row 1: Basic Info -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control" value="<?php echo $product ? htmlspecialchars($product['product_name']) : ''; ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="text" name="sku" class="form-control" value="<?php echo $product ? htmlspecialchars($product['sku']) : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Selling Price</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $product ? $product['price'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>MRP (Strike)</label>
                                    <input type="number" step="0.01" name="mrp" class="form-control" value="<?php echo $product ? $product['mrp'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Stock Status</label>
                                    <select name="stock_status" class="form-control">
                                        <option value="Available" <?php echo ($product && $product['stock_status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                                        <option value="Limited Stock" <?php echo ($product && $product['stock_status'] == 'Limited Stock') ? 'selected' : ''; ?>>Limited Stock</option>
                                        <option value="Out of Stock" <?php echo ($product && $product['stock_status'] == 'Out of Stock') ? 'selected' : ''; ?>>Out of Stock</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Row 2: Category Assignment -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select name="brand_name" id="brand_name" class="form-control select2" style="width: 100%;">
                                        <option value="">Select or Create</option>
                                        <?php if($product && $product['brand_name']): ?>
                                            <option value="<?php echo htmlspecialchars($product['brand_name']); ?>" selected><?php echo htmlspecialchars($product['brand_name']); ?></option>
                                        <?php endif; ?>
                                        <?php while($b = mysqli_fetch_assoc($brands_res)): ?>
                                            <?php if($product && $product['brand_name'] == $b['brand_name']) continue; ?>
                                            <option value="<?php echo htmlspecialchars($b['brand_name']); ?>"><?php echo htmlspecialchars($b['brand_name']); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Main Category <small class="text-muted">(required)</small></label>
                                    <select name="category_id" id="category_id" class="form-control" onchange="loadSubCategories(this.value)" required>
                                        <option value="">Select Category</option>
                                        <?php while($c = mysqli_fetch_assoc($categories)): ?>
                                            <option value="<?php echo $c['id']; ?>" <?php if($product && $product['category_id'] == $c['id']) echo 'selected'; ?>><?php echo htmlspecialchars($c['category_name']); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sub Category <small class="text-muted">(optional — leave blank if none)</small></label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control">
                                        <option value="">— No Subcategory —</option>
                                        <?php if($product && $product['sub_category_id'] && $product['category_id']): ?>
                                            <?php
                                            $current_sub = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = " . (int)$product['category_id'] . " ORDER BY sub_category_name ASC");
                                            while($sc = mysqli_fetch_assoc($current_sub)):
                                            ?>
                                                <option value="<?php echo $sc['id']; ?>" <?php if($product['sub_category_id'] == $sc['id']) echo 'selected'; ?>><?php echo htmlspecialchars($sc['sub_category_name']); ?></option>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </select>
                                    <small class="form-text text-info">
                                        <i class="fas fa-info-circle"></i>
                                        If the selected category has no subcategories, leave this blank. Products will appear directly under the main category.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Descriptions -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="short_description" id="short_description" class="form-control" rows="3"><?php echo $product ? $product['short_description'] : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Short Technical Specifications</label>
                                    <textarea name="short_technical_specifications" id="short_technical_specifications" class="form-control" rows="3"><?php echo $product ? $product['short_technical_specifications'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4"><?php echo $product ? $product['description'] : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Long Specifications</label>
                            <textarea name="long_specifications" id="long_specifications" class="form-control" rows="4"><?php echo $product ? $product['long_specifications'] : ''; ?></textarea>
                        </div>

                        <!-- Row 4: Images -->
                        <div class="row">
                            <?php for($i=1; $i<=4; $i++): ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Image <?php echo $i; ?></label>
                                    <?php if($product && $product["image$i"]): ?>
                                        <div class="mb-2"><img src="../<?php echo $product["image$i"]; ?>" width="60" style="border-radius:4px;"></div>
                                    <?php endif; ?>
                                    <input type="file" name="image<?php echo $i; ?>" class="form-control-file" accept="image/*">
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="save_product" class="btn btn-primary">Save Product</button>
                        <a href="products.php" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#brand_name').select2({
            tags: true,
            placeholder: "Select or type to create new",
            allowClear: true
        });
    });

    function loadSubCategories(catId) {
        let subDropdown = document.getElementById('sub_category_id');
        subDropdown.innerHTML = '<option value="">— No Subcategory —</option>';
        
        if (!catId) return;

        fetch('ajax_categories.php?cat_id=' + catId)
            .then(res => res.json())
            .then(data => {
                if (data.length === 0) {
                    // No subcategories for this category — inform the user
                    let opt = document.createElement('option');
                    opt.value = '';
                    opt.textContent = '— This category has no subcategories —';
                    opt.disabled = true;
                    subDropdown.appendChild(opt);
                } else {
                    data.forEach(item => {
                        let option = document.createElement('option');
                        option.value = item.id;
                        option.textContent = item.sub_category_name;
                        subDropdown.appendChild(option);
                    });
                }
            });
    }

    CKEDITOR.replace('short_description');
    CKEDITOR.replace('short_technical_specifications');
    CKEDITOR.replace('description');
    CKEDITOR.replace('long_specifications');
</script>
