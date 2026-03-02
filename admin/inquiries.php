<?php
ob_start();
include '../includes/conneaction.php';

$message = "";

// Handle Delete
if (isset($_GET['delete_id'])) {
    $del_id = (int)$_GET['delete_id'];
    if (mysqli_query($con, "DELETE FROM inquiries WHERE id = $del_id")) {
        header("Location: inquiries.php?msg=deleted");
        exit();
    }
}

// Handle Status Update
if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $status = mysqli_real_escape_string($con, $_GET['status']);
    mysqli_query($con, "UPDATE inquiries SET status = '$status' WHERE id = $id");
    header("Location: inquiries.php?msg=updated");
    exit();
}

include 'header.php';

$inquiries = mysqli_query($con, "SELECT * FROM inquiries ORDER BY created_at DESC");

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'deleted') $message = "<div class='alert alert-danger'>Inquiry deleted successfully!</div>";
    if ($_GET['msg'] == 'updated') $message = "<div class='alert alert-success'>Inquiry status updated!</div>";
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Customer Inquiries</h1>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <?php echo $message; ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="inquiryTable">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($inquiries)): ?>
                            <tr>
                                <td><?php echo date('d-M-Y H:i', strtotime($row['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo htmlspecialchars($row['email']); ?></a></td>
                                <td><?php echo htmlspecialchars($row['subject']); ?></td>
                                <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                                <td>
                                    <span class="badge badge-<?php 
                                        echo $row['status'] == 'pending' ? 'warning' : ($row['status'] == 'responded' ? 'info' : 'success'); 
                                    ?>"><?php echo ucfirst($row['status']); ?></span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                            Status
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="inquiries.php?id=<?php echo $row['id']; ?>&status=pending">Pending</a>
                                            <a class="dropdown-item" href="inquiries.php?id=<?php echo $row['id']; ?>&status=responded">Responded</a>
                                            <a class="dropdown-item" href="inquiries.php?id=<?php echo $row['id']; ?>&status=closed">Closed</a>
                                        </div>
                                    </div>
                                    <a href="inquiries.php?delete_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
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
