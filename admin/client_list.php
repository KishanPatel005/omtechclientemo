<?php
ob_start();
include '../includes/conneaction.php';

include 'header.php';

$sql = "SELECT email, 
               MAX(name) as name, 
               MAX(phone) as phone, 
               MAX(created_at) as last_activity,
               COUNT(*) as total_interactions
        FROM (
            SELECT email, name, '' as phone, created_at FROM inquiries
            UNION ALL
            SELECT email, CONCAT(first_name, ' ', last_name) as name, phone, created_at FROM cart_added
        ) as combined
        GROUP BY email
        ORDER BY last_activity DESC";

$clients = mysqli_query($con, $sql);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">Unified Client List</h1>
            <p class="text-muted">Combined record of users who made inquiries or added items to their cart.</p>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="clientTable">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Last Activity</th>
                                <th>Interactions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($clients)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['name'] ?: 'Unknown'); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone'] ?: 'N/A'); ?></td>
                                <td><?php echo date('d-M-Y H:i', strtotime($row['last_activity'])); ?></td>
                                <td><span class="badge badge-info"><?php echo $row['total_interactions']; ?></span></td>
                                <td>
                                    <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-sm btn-primary">
                                        <i class="fas fa-envelope"></i> Email
                                    </a>
                                    <?php if($row['phone']): ?>
                                    <a href="tel:<?php echo $row['phone']; ?>" class="btn btn-sm btn-success">
                                        <i class="fas fa-phone"></i> Call
                                    </a>
                                    <?php endif; ?>
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
