<?php
ob_start();
include '../includes/conneaction.php';

$message = "";

// Handle Delete
if (isset($_GET['delete_id'])) {
    $del_id = (int)$_GET['delete_id'];
    if (mysqli_query($con, "DELETE FROM reviews WHERE id = $del_id")) {
        header("Location: reviews.php?msg=deleted");
        exit();
    }
}

// Handle Add/Edit
if (isset($_POST['save_review'])) {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $product_id = (int)$_POST['product_id'];
    $customer_name = mysqli_real_escape_string($con, $_POST['customer_name']);
    $stars = (int)$_POST['stars'];
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $review_date = mysqli_real_escape_string($con, $_POST['review_date']);

    if ($id > 0) {
        $sql = "UPDATE reviews SET product_id=$product_id, customer_name='$customer_name', stars=$stars, description='$description', review_date='$review_date' WHERE id=$id";
    } else {
        $sql = "INSERT INTO reviews (product_id, customer_name, stars, description, review_date) VALUES ($product_id, '$customer_name', $stars, '$description', '$review_date')";
    }

    if (mysqli_query($con, $sql)) {
        header("Location: reviews.php?msg=success");
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Error: " . mysqli_error($con) . "</div>";
    }
}

include 'header.php';

$reviews = mysqli_query($con, "SELECT r.*, p.product_name FROM reviews r JOIN products p ON r.product_id = p.id ORDER BY r.review_date DESC");
$products = mysqli_query($con, "SELECT id, product_name FROM products WHERE status='active'");

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') $message = "<div class='alert alert-success'>Review saved successfully!</div>";
    if ($_GET['msg'] == 'deleted') $message = "<div class='alert alert-warning'>Review deleted successfully!</div>";
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Product Reviews</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reviewModal" onclick="resetForm()">
                        <i class="fas fa-plus"></i> Add New Review
                    </button>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="reviewTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Customer</th>
                                <th>Stars</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($reviews)): ?>
                            <tr>
                                <td><?php echo date('d-m-Y', strtotime($row['review_date'])); ?></td>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                                <td>
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <i class="fas fa-star <?php echo $i <= $row['stars'] ? 'text-warning' : 'text-muted'; ?>"></i>
                                    <?php endfor; ?>
                                </td>
                                <td><?php echo substr(htmlspecialchars($row['description']), 0, 50); ?>...</td>
                                <td>
                                    <button class="btn btn-sm btn-info" onclick='editReview(<?php echo json_encode($row); ?>)'>
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="reviews.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
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

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add New Review</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="review_id">
                    <div class="form-group">
                        <label>Select Product</label>
                        <select name="product_id" id="prod_id" class="form-control select2" style="width: 100%;" required>
                            <option value="">Select Product</option>
                            <?php 
                            mysqli_data_seek($products, 0);
                            while($p = mysqli_fetch_assoc($products)): ?>
                                <option value="<?php echo $p['id']; ?>"><?php echo htmlspecialchars($p['product_name']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="customer_name" id="cust_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stars (1-5)</label>
                        <select name="stars" id="rev_stars" class="form-control" required>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Good</option>
                            <option value="3">3 - Average</option>
                            <option value="2">2 - Poor</option>
                            <option value="1">1 - Terrible</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Review Date</label>
                        <input type="date" name="review_date" id="rev_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="rev_desc" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_review" class="btn btn-primary">Save Review</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
    function resetForm() {
        $('#review_id').val('');
        $('#cust_name').val('');
        $('#prod_id').val('').trigger('change');
        $('#rev_stars').val('5');
        $('#rev_desc').val('');
        $('#rev_date').val('<?php echo date('Y-m-d'); ?>');
        $('#modalTitle').text('Add New Review');
    }

    function editReview(data) {
        $('#review_id').val(data.id);
        $('#prod_id').val(data.product_id).trigger('change');
        $('#cust_name').val(data.customer_name);
        $('#rev_stars').val(data.stars);
        $('#rev_desc').val(data.description);
        $('#rev_date').val(data.review_date);
        $('#modalTitle').text('Edit Review');
        $('#reviewModal').modal('show');
    }
</script>
