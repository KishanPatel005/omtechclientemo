<?php
include 'includes/conneaction.php';

$sql = "CREATE TABLE IF NOT EXISTS cart_added (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    product_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

if (mysqli_query($con, $sql)) {
    echo "cart_added table created or already exists.";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
?>
