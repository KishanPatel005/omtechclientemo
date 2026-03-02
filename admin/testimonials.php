<?php
ob_start();
include 'header.php';
include '../includes/conneaction.php';

$message = "";

// Handle Add/Update Testimonial
if (isset($_POST['save_testimonial'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $content = mysqli_real_escape_string($con, $_POST['content']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $rating = (int)$_POST['rating'];
    
    $image_path = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_name = "testi_" . time() . "." . $ext;
        if (move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/testimonials/" . $image_name)) {
            $image_path = "uploads/testimonials/" . $image_name;
        }
    } else {
        $image_path = $_POST['existing_image'];
    }

    if ($id > 0) {
        $sql = "UPDATE testimonials SET name='$name', designation='$designation', subject='$subject', content='$content', image='$image_path', status='$status', rating='$rating' WHERE id=$id";
    } else {
        $sql = "INSERT INTO testimonials (name, designation, subject, content, image, status, rating) VALUES ('$name', '$designation', '$subject', '$content', '$image_path', '$status', '$rating')";
    }

    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Testimonial saved successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($con, "DELETE FROM testimonials WHERE id=$id");
    $message = "<div class='alert alert-danger'>Testimonial deleted!</div>";
}

$edit_data = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $fetch = mysqli_query($con, "SELECT * FROM testimonials WHERE id=$id");
    $edit_data = mysqli_fetch_assoc($fetch);
}

$testimonials = mysqli_query($con, "SELECT * FROM testimonials ORDER BY id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Testimonials Management</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?php echo $edit_data ? "Edit" : "Add New"; ?> Testimonial</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $edit_data ? $edit_data['id'] : '0'; ?>">
                            <input type="hidden" name="existing_image" value="<?php echo $edit_data ? $edit_data['image'] : ''; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $edit_data ? htmlspecialchars($edit_data['name']) : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control" value="<?php echo $edit_data ? htmlspecialchars($edit_data['designation']) : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Subject/Title</label>
                                    <input type="text" name="subject" class="form-control" value="<?php echo $edit_data ? htmlspecialchars($edit_data['subject']) : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Testimonial Content</label>
                                    <textarea name="content" class="form-control" rows="4" required><?php echo $edit_data ? htmlspecialchars($edit_data['content']) : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Rating (1-5)</label>
                                    <select name="rating" class="form-control">
                                        <?php for($i=5; $i>=1; $i--): ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($edit_data && $edit_data['rating'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?> Star</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Author Image</label>
                                    <?php if($edit_data && $edit_data['image']): ?>
                                        <br><img src="../<?php echo $edit_data['image']; ?>" width="50" class="mb-2">
                                    <?php endif; ?>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" <?php echo ($edit_data && $edit_data['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo ($edit_data && $edit_data['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="save_testimonial" class="btn btn-primary">Save Testimonial</button>
                                <?php if($edit_data): ?>
                                    <a href="testimonials.php" class="btn btn-default">Cancel</a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Testimonial List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Author</th>
                                        <th>Content</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($testimonials)): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php if($row['image']): ?>
                                                    <img src="../<?php echo $row['image']; ?>" width="40" height="40" class="rounded-circle mr-2">
                                                <?php endif; ?>
                                                <div>
                                                    <strong><?php echo htmlspecialchars($row['name']); ?></strong><br>
                                                    <small class="text-muted"><?php echo htmlspecialchars($row['designation']); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($row['subject']); ?></strong><br>
                                            <div class="text-warning">
                                                <?php for($i=1; $i<=5; $i++) echo ($i <= $row['rating'] ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>'); ?>
                                            </div>
                                            <small><?php echo substr(htmlspecialchars($row['content']), 0, 100); ?>...</small>
                                        </td>
                                        <td><span class="badge badge-<?php echo $row['status'] == 'active' ? 'success' : 'secondary'; ?>"><?php echo ucfirst($row['status']); ?></span></td>
                                        <td>
                                            <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
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
