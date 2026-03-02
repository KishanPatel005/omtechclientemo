<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

// Handle Add Category
if (isset($_POST['add_category'])) {
    $name = mysqli_real_escape_string($con, $_POST['category_name']);
    $show_on_home = mysqli_real_escape_string($con, $_POST['show_on_home']);
    $priority = (int)$_POST['priority'];
    $image = "";
    
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] == 0) {
        $ext = pathinfo($_FILES['category_image']['name'], PATHINFO_EXTENSION);
        $image_name = "cat_" . time() . "." . $ext;
        if (move_uploaded_file($_FILES['category_image']['tmp_name'], "../uploads/categories/" . $image_name)) {
            $image = "uploads/categories/" . $image_name;
        }
    }
    
    $sql = "INSERT INTO categories (category_name, category_image, show_on_home, priority) VALUES ('$name', '$image', '$show_on_home', '$priority')";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Category added successfully!</div>";
    }
}

// Handle Quick Update
if (isset($_POST['update_quick'])) {
    $id = (int)$_POST['cat_id'];
    $show_on_home = mysqli_real_escape_string($con, $_POST['show_on_home']);
    $priority = (int)$_POST['priority'];
    
    mysqli_query($con, "UPDATE categories SET show_on_home = '$show_on_home', priority = $priority WHERE id = $id");
    $message = "<div class='alert alert-success'>Category updated!</div>";
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fetch = mysqli_query($con, "SELECT category_image FROM categories WHERE id = $id");
    $data = mysqli_fetch_assoc($fetch);
    if (!empty($data['category_image']) && file_exists("../" . $data['category_image'])) {
        unlink("../" . $data['category_image']);
    }
    mysqli_query($con, "DELETE FROM categories WHERE id = $id");
    $message = "<div class='alert alert-danger'>Category deleted!</div>";
}

$categories = mysqli_query($con, "SELECT * FROM categories ORDER BY priority ASC, id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Categories Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input type="file" name="category_image" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Show on Home</label>
                                    <select name="show_on_home" class="form-control">
                                        <option value="no">No</option>
                                        <option value="yes">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Priority (Lower shows first)</label>
                                    <input type="number" name="priority" class="form-control" value="0">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Home / Priority</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($categories)): ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td>
                                            <?php if($row['category_image']): ?>
                                                <img src="../<?php echo $row['category_image']; ?>" width="50" class="img-thumbnail">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $row['category_name']; ?></td>
                                        <td>
                                            <form method="post" class="form-inline">
                                                <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>">
                                                <select name="show_on_home" class="form-control form-control-sm mr-2" style="width: 70px;">
                                                    <option value="no" <?php if($row['show_on_home'] == 'no') echo 'selected'; ?>>No</option>
                                                    <option value="yes" <?php if($row['show_on_home'] == 'yes') echo 'selected'; ?>>Yes</option>
                                                </select>
                                                <input type="number" name="priority" class="form-control form-control-sm mr-2" value="<?php echo $row['priority']; ?>" style="width: 60px;">
                                                <button type="submit" name="update_quick" class="btn btn-info btn-sm">Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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

<?php include 'footer.php'; ?>
