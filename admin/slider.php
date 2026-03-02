<?php
ob_start();
include '../includes/conneaction.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$row = null;
if ($id > 0) {
    $res = mysqli_query($con, "SELECT * FROM sliders WHERE id = $id");
    $row = mysqli_fetch_assoc($res);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $headline = mysqli_real_escape_string($con, $_POST['headline']);
    $sub_headline = mysqli_real_escape_string($con, $_POST['sub_headline']);
    $credibility_line = mysqli_real_escape_string($con, $_POST['credibility_line']);
    $button_link = mysqli_real_escape_string($con, $_POST['button_link']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $image_path = $row ? $row['image'] : '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/sliders/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        
        $file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $new_name = time() . "_" . rand(1000, 9999) . "." . $file_ext;
        $target_file = $target_dir . $new_name;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "uploads/sliders/" . $new_name;
        }
    }

    if ($id > 0) {
        $sql = "UPDATE sliders SET 
                image = '$image_path', 
                headline = '$headline', 
                sub_headline = '$sub_headline', 
                credibility_line = '$credibility_line', 
                button_link = '$button_link', 
                status = '$status' 
                WHERE id = $id";
    } else {
        $sql = "INSERT INTO sliders (image, headline, sub_headline, credibility_line, button_link, status) 
                VALUES ('$image_path', '$headline', '$sub_headline', '$credibility_line', '$button_link', '$status')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: manage_sliders.php");
        exit();
    }
}

include 'header.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0"><?php echo $id > 0 ? 'Edit' : 'Add'; ?> Slider</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Slider Image</label>
                            <input type="file" name="image" class="form-control" <?php echo $id > 0 ? '' : 'required'; ?>>
                            <?php if($row): ?>
                                <img src="../<?php echo $row['image']; ?>" width="150" class="mt-2">
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Headline</label>
                            <input type="text" name="headline" class="form-control" value="<?php echo $row ? htmlspecialchars($row['headline']) : ''; ?>" >
                        </div>
                        <div class="form-group">
                            <label>Sub Headline</label>
                            <input type="text" name="sub_headline" class="form-control" value="<?php echo $row ? htmlspecialchars($row['sub_headline']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Credibility Line</label>
                            <input type="text" name="credibility_line" class="form-control" value="<?php echo $row ? htmlspecialchars($row['credibility_line']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label>Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="<?php echo $row ? htmlspecialchars($row['button_link']) : 'products.php'; ?>">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active" <?php echo ($row && $row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                <option value="inactive" <?php echo ($row && $row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo $id > 0 ? 'Update' : 'Add'; ?> Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
