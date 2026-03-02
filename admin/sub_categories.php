<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

// ─── Handle Add Sub Category ───────────────────────────────────────────────
if (isset($_POST['add_sub_category'])) {
    $cat_id = (int)$_POST['category_id'];
    $name   = mysqli_real_escape_string($con, $_POST['sub_category_name']);
    $img_path = '';

    if (isset($_FILES['sub_image']) && $_FILES['sub_image']['error'] == 0) {
        $ext      = pathinfo($_FILES['sub_image']['name'], PATHINFO_EXTENSION);
        $img_name = "sub_" . time() . "_" . rand(1000, 9999) . "." . $ext;
        $dest     = "../uploads/sub_categories/" . $img_name;
        if (move_uploaded_file($_FILES['sub_image']['tmp_name'], $dest)) {
            $img_path = "uploads/sub_categories/" . $img_name;
        }
    }

    $sql = "INSERT INTO sub_categories (category_id, sub_category_name, image) VALUES ($cat_id, '$name', '$img_path')";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Sub Category added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}

// ─── Handle Edit Sub Category ──────────────────────────────────────────────
if (isset($_POST['edit_sub_category'])) {
    $edit_id  = (int)$_POST['edit_id'];
    $cat_id   = (int)$_POST['edit_category_id'];
    $name     = mysqli_real_escape_string($con, $_POST['edit_sub_category_name']);
    $old_img  = mysqli_real_escape_string($con, $_POST['old_image']);
    $img_path = $old_img; // keep existing by default

    if (isset($_FILES['edit_sub_image']) && $_FILES['edit_sub_image']['error'] == 0) {
        $ext      = pathinfo($_FILES['edit_sub_image']['name'], PATHINFO_EXTENSION);
        $img_name = "sub_" . time() . "_" . rand(1000, 9999) . "." . $ext;
        $dest     = "../uploads/sub_categories/" . $img_name;
        if (move_uploaded_file($_FILES['edit_sub_image']['tmp_name'], $dest)) {
            // Delete old image if it exists locally
            if ($old_img && file_exists("../" . $old_img)) {
                unlink("../" . $old_img);
            }
            $img_path = "uploads/sub_categories/" . $img_name;
        }
    }

    $sql = "UPDATE sub_categories SET category_id=$cat_id, sub_category_name='$name', image='$img_path' WHERE id=$edit_id";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Sub Category updated successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}

// ─── Handle Delete ─────────────────────────────────────────────────────────
if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    // Get image path before deleting
    $del_res = mysqli_query($con, "SELECT image FROM sub_categories WHERE id = $del_id");
    if ($del_row = mysqli_fetch_assoc($del_res)) {
        if (!empty($del_row['image']) && file_exists("../" . $del_row['image'])) {
            unlink("../" . $del_row['image']);
        }
    }
    mysqli_query($con, "DELETE FROM sub_categories WHERE id = $del_id");
    $message = "<div class='alert alert-warning'>Sub Category deleted.</div>";
}

$categories_list = mysqli_query($con, "SELECT * FROM categories ORDER BY category_name ASC");
$sub_categories  = mysqli_query($con, "SELECT sc.*, c.category_name FROM sub_categories sc JOIN categories c ON sc.category_id = c.id ORDER BY c.category_name ASC, sc.sub_category_name ASC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub Categories Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="row">
                <!-- Add Form -->
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header"><h3 class="card-title">Add Sub Category</h3></div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        // reset pointer
                                        mysqli_data_seek($categories_list, 0);
                                        while($c = mysqli_fetch_assoc($categories_list)):
                                        ?>
                                            <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['category_name']); ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" name="sub_category_name" class="form-control" required placeholder="e.g. Power Servo Cables">
                                </div>
                                <div class="form-group">
                                    <label>Sub Category Image <small class="text-muted">(optional)</small></label>
                                    <input type="file" name="sub_image" class="form-control-file" accept="image/*">
                                    <small class="form-text text-muted">Recommended: square image, at least 400×400px.</small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_sub_category" class="btn btn-primary btn-block">
                                    <i class="fas fa-plus mr-1"></i> Add Sub Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- List -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Sub Category List</h3></div>
                        <div class="card-body p-0">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="50">ID</th>
                                        <th width="60">Image</th>
                                        <th>Parent Category</th>
                                        <th>Sub Category Name</th>
                                        <th width="130">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($sub_categories)): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <?php if(!empty($row['image'])): ?>
                                                <img src="../<?php echo htmlspecialchars($row['image']); ?>" width="45" height="45" style="object-fit:cover; border-radius:6px; border:1px solid #eee;">
                                            <?php else: ?>
                                                <span class="badge badge-secondary">No img</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['sub_category_name']); ?></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" 
                                                    onclick="openEditModal(<?php echo $row['id']; ?>, <?php echo $row['category_id']; ?>, '<?php echo addslashes($row['sub_category_name']); ?>', '<?php echo addslashes($row['image'] ?? ''); ?>')">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this sub category?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editSubCatModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <input type="hidden" name="old_image" id="old_image">
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select name="edit_category_id" id="edit_category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            <?php
                            $cats_for_modal = mysqli_query($con, "SELECT * FROM categories ORDER BY category_name ASC");
                            while($cm = mysqli_fetch_assoc($cats_for_modal)):
                            ?>
                                <option value="<?php echo $cm['id']; ?>"><?php echo htmlspecialchars($cm['category_name']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Category Name</label>
                        <input type="text" name="edit_sub_category_name" id="edit_sub_category_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Current Image</label>
                        <div id="current_img_wrap" class="mb-2"></div>
                        <label>New Image <small class="text-muted">(leave blank to keep current)</small></label>
                        <input type="file" name="edit_sub_image" class="form-control-file" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit_sub_category" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Save Changes
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
function openEditModal(id, catId, name, img) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_category_id').value = catId;
    document.getElementById('edit_sub_category_name').value = name;
    document.getElementById('old_image').value = img;

    var imgWrap = document.getElementById('current_img_wrap');
    if (img) {
        imgWrap.innerHTML = '<img src="../' + img + '" width="80" height="80" style="object-fit:cover; border-radius:8px; border:1px solid #ddd;">';
    } else {
        imgWrap.innerHTML = '<span class="text-muted">No current image</span>';
    }

    $('#editSubCatModal').modal('show');
}
</script>
