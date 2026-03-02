<?php
ob_start();
include '../includes/conneaction.php';

$message = "";

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fetch = mysqli_query($con, "SELECT image1, image2, image3, image4 FROM products WHERE id = $id");
    $data = mysqli_fetch_assoc($fetch);
    for ($i = 1; $i <= 4; $i++) {
        $img = $data['image' . $i];
        if (!empty($img) && file_exists("../" . $img)) {
            unlink("../" . $img);
        }
    }
    mysqli_query($con, "DELETE FROM products WHERE id = $id");
    header("Location: products.php?msg=deleted");
    exit();
}

include 'header.php';
$products = mysqli_query($con, "SELECT p.*, c.category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC");

if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    $message = "<div class='alert alert-danger'>Product deleted successfully!</div>";
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products List</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="manage_products.php" class="btn btn-primary">Add New Product</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Stock Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($products)): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td>
                                    <?php if($row['image1']): ?>
                                        <img src="../<?php echo $row['image1']; ?>" width="50">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td><?php echo $row['sku']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td>
                                    <?php
                                    $status = $row['stock_status'];
                                    $badge_class = 'badge-success';
                                    if ($status == 'Limited Stock') $badge_class = 'badge-warning';
                                    if ($status == 'Out of Stock') $badge_class = 'badge-danger';
                                    ?>
                                    <span class="badge <?php echo $badge_class; ?>"><?php echo $status; ?></span>
                                </td>
                                <td>
                                    <a href="manage_products.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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
