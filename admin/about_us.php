<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

if (isset($_POST['update_about'])) {
    $target_dir = "../uploads/about/";
    
    // Fetch current images
    $fetch_sql = "SELECT * FROM about_us WHERE id = 1";
    $fetch_res = mysqli_query($con, $fetch_sql);
    $current_data = mysqli_fetch_assoc($fetch_res);
    
    $update_fields = [];
    
    for ($i = 1; $i <= 3; $i++) {
        $field_name = "image" . $i;
        if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
            $ext = pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION);
            $new_name = "about_" . $i . "_" . time() . "." . $ext;
            $target_file = $target_dir . $new_name;
            if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $target_file)) {
                // Delete old file if exists
                if (!empty($current_data[$field_name]) && file_exists("../" . $current_data[$field_name])) {
                    @unlink("../" . $current_data[$field_name]);
                }
                $db_path = "uploads/about/" . $new_name;
                $update_fields[] = "$field_name = '$db_path'";
            }
        }
    }
    
    if (!empty($update_fields)) {
        $update_sql = "UPDATE about_us SET " . implode(", ", $update_fields) . " WHERE id = 1";
        if (mysqli_query($con, $update_sql)) {
            $message = "<div class='alert alert-success'>About Us images updated successfully!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error updating database: " . mysqli_error($con) . "</div>";
        }
    } else {
        $message = "<div class='alert alert-info'>No new images uploaded.</div>";
    }
}

// Fetch current data for display
$res = mysqli_query($con, "SELECT * FROM about_us WHERE id = 1");
$about = mysqli_fetch_assoc($res);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage About Us</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update About Us Photos (Max 3)</h3>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <?php for ($i = 1; $i <= 3; $i++): ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image<?php echo $i; ?>">Photo <?php echo $i; ?></label>
                                    <div class="mb-2">
                                        <?php if (!empty($about['image' . $i])): ?>
                                            <img src="../<?php echo $about['image' . $i]; ?>" alt="Current Image <?php echo $i; ?>" class="img-thumbnail" style="height: 150px;">
                                        <?php else: ?>
                                            <img src="https://placehold.co/150x150?text=No+Image" alt="Placeholder" class="img-thumbnail" style="height: 150px;">
                                        <?php endif; ?>
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image<?php echo $i; ?>" name="image<?php echo $i; ?>" accept="image/*">
                                            <label class="custom-file-label" for="image<?php echo $i; ?>">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_about" class="btn btn-primary">Update Photos</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>

<script>
$(document).ready(function () {
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
});
</script>
