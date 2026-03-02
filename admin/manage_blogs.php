<?php
ob_start();
include '../includes/conneaction.php';
include 'header.php';

$message = "";

if (isset($_GET['delete_id'])) {
    $del_id = (int)$_GET['delete_id'];
    // Fetch images to delete from server
    $res = mysqli_query($con, "SELECT image1, image2, image3, image4 FROM blogs WHERE id = $del_id");
    $data = mysqli_fetch_assoc($res);
    if ($data) {
        for ($i = 1; $i <= 4; $i++) {
            $img = $data["image$i"];
            if (!empty($img) && file_exists("../" . $img)) {
                unlink("../" . $img);
            }
        }
    }
    
    if (mysqli_query($con, "DELETE FROM blogs WHERE id = $del_id")) {
        $message = "<div class='alert alert-danger'>Blog deleted successfully!</div>";
    }
}

$blogs = mysqli_query($con, "SELECT * FROM blogs ORDER BY created_at DESC");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Blogs</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="blogs.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Blog</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php 
            if (isset($_GET['msg']) && $_GET['msg'] == 'success') echo "<div class='alert alert-success'>Blog saved successfully!</div>";
            echo $message; 
            ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="blogTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($blogs)): ?>
                            <tr>
                                <td><?php echo date('d-M-Y', strtotime($row['created_at'])); ?></td>
                                <td>
                                    <?php if($row['image1']): ?>
                                        <img src="../<?php echo $row['image1']; ?>" width="60">
                                    <?php else: ?>
                                        <span class="text-muted">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['title']); ?></td>
                                <td>
                                    <span class="badge badge-<?php echo $row['status'] == 'active' ? 'success' : 'secondary'; ?>">
                                        <?php echo ucfirst($row['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="blogs.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="manage_blogs.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">
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
    </section>
</div>

<?php include 'footer.php'; ?>
