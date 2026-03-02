<?php
include 'header.php';
include '../includes/conneaction.php';

$message = "";

if (isset($_POST['update_tag'])) {
    $content = mysqli_real_escape_string($con, $_POST['tag_content']);
    $update_sql = "UPDATE tag_line SET content = '$content' WHERE id = 1";
    if (mysqli_query($con, $update_sql)) {
        $message = "<div class='alert alert-success'>Tag line updated successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error updating tag line: " . mysqli_error($con) . "</div>";
    }
}

// Fetch current data
$res = mysqli_query($con, "SELECT * FROM tag_line WHERE id = 1");
$tag_data = mysqli_fetch_assoc($res);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Tag Line</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Header Tag Line</h3>
                </div>
                <form method="post">
                    <div class="card-body">
                       <div class="form-group">
    <label for="tag_content">Tag Line Content</label>
    <textarea class="form-control"
              id="tag_content"
              name="tag_content"
              rows="3"
              maxlength="35"
              oninput="document.getElementById('charCount').innerText = this.value.length + '/35';"
              required><?php echo htmlspecialchars($tag_data['content']); ?></textarea>
    <small id="charCount">0/35</small>
</div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="update_tag" class="btn btn-primary">Update Tag Line</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
