<?php
ob_start();
include '../includes/conneaction.php';
include 'header.php';

$message = "";
$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$edit_data = null;

if ($blog_id > 0) {
    $res = mysqli_query($con, "SELECT * FROM blogs WHERE id = $blog_id");
    $edit_data = mysqli_fetch_assoc($res);
}

if (isset($_POST['save_blog'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $short_desc = mysqli_real_escape_string($con, $_POST['short_description']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    
    $images = [];
    for ($i = 1; $i <= 4; $i++) {
        $img_field = "image$i";
        $img_path = $edit_data ? $edit_data[$img_field] : "";
        
        if (isset($_FILES[$img_field]) && $_FILES[$img_field]['error'] == 0) {
            $ext = pathinfo($_FILES[$img_field]['name'], PATHINFO_EXTENSION);
            $new_name = "blog_" . time() . "_$i." . $ext;
            if (move_uploaded_file($_FILES[$img_field]['tmp_name'], "../uploads/blogs/" . $new_name)) {
                $img_path = "uploads/blogs/" . $new_name;
            }
        }
        $images[$img_field] = $img_path;
    }

    if ($blog_id > 0) {
        $sql = "UPDATE blogs SET 
                title='$title', 
                short_description='$short_desc', 
                description='$description', 
                image1='{$images['image1']}', 
                image2='{$images['image2']}', 
                image3='{$images['image3']}', 
                image4='{$images['image4']}', 
                status='$status' 
                WHERE id = $blog_id";
    } else {
        $sql = "INSERT INTO blogs (title, short_description, description, image1, image2, image3, image4, status) 
                VALUES ('$title', '$short_desc', '$description', '{$images['image1']}', '{$images['image2']}', '{$images['image3']}', '{$images['image4']}', '$status')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: manage_blogs.php?msg=success");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0"><?php echo $blog_id > 0 ? 'Edit Blog' : 'Add New Blog'; ?></h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card card-primary">
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $edit_data ? htmlspecialchars($edit_data['title']) : ''; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Short Description (For listing page)</label>
                                    <textarea name="short_description" class="form-control" rows="3"><?php echo $edit_data ? htmlspecialchars($edit_data['short_description']) : ''; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Full Blog Content</label>
                                    <textarea name="description" id="editor" class="form-control"><?php echo $edit_data ? htmlspecialchars($edit_data['description']) : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" <?php echo ($edit_data && $edit_data['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?php echo ($edit_data && $edit_data['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                </div>
                                <?php for($i=1; $i<=4; $i++): ?>
                                <div class="form-group">
                                    <label>Blog Image <?php echo $i; ?></label>
                                    <?php if($edit_data && $edit_data["image$i"]): ?>
                                        <br><img src="../<?php echo $edit_data["image$i"]; ?>" width="100" class="mb-2">
                                    <?php endif; ?>
                                    <input type="file" name="image<?php echo $i; ?>" class="form-control" accept="image/*">
                                </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="save_blog" class="btn btn-primary">Save Blog Post</button>
                        <a href="manage_blogs.php" class="btn btn-default">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include 'footer.php'; ?>
