<?php
ob_start();
include '../includes/conneaction.php';

$message = "";

if (isset($_POST['update_popup'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $is_active = isset($_POST['is_active']) ? 1 : 0;

    $sql = "UPDATE welcome_popup SET title='$title', description='$description', is_active=$is_active WHERE id=1";
    if (mysqli_query($con, $sql)) {
        $message = "<div class='alert alert-success'>Welcome popup settings updated!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}

$res = mysqli_query($con, "SELECT * FROM welcome_popup WHERE id=1");
$popup = mysqli_fetch_assoc($res);

include 'header.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Welcome Popup Settings</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card card-primary">
                <form method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Show Popup (On/Off)</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" <?php echo $popup['is_active'] ? 'checked' : ''; ?>>
                                <label class="custom-control-label" for="is_active">Enable welcome popup on frontend</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Popup Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($popup['title']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Popup Description</label>
                            <textarea name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($popup['description']); ?></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_popup" class="btn btn-primary">Save Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
