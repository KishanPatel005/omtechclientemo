<?php
ob_start();
include '../includes/conneaction.php';

if (isset($_GET['del_id'])) {
    $del_id = (int)$_GET['del_id'];
    mysqli_query($con, "DELETE FROM sliders WHERE id = $del_id");
    header("Location: manage_sliders.php");
    exit();
}

include 'header.php';
$sliders = mysqli_query($con, "SELECT * FROM sliders ORDER BY id DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid d-flex justify-content-between">
            <h1 class="m-0">Manage Sliders</h1>
            <a href="slider.php" class="btn btn-primary">Add New Slider</a>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Headline</th>
                                <th>Sub Headline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($sliders)): ?>
                            <tr>
                                <td><img src="../<?php echo $row['image']; ?>" width="100"></td>
                                <td><?php echo htmlspecialchars($row['headline']); ?></td>
                                <td><?php echo htmlspecialchars($row['sub_headline']); ?></td>
                                <td><?php echo ucfirst($row['status']); ?></td>
                                <td>
                                    <a href="slider.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                                    <a href="manage_sliders.php?del_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this slider?')">Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'footer.php'; ?>
