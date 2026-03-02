<?php
include 'includes/conneaction.php';

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    customer_name VARCHAR(255) NOT NULL,
    stars INT NOT NULL CHECK (stars >= 1 AND stars <= 5),
    description TEXT NOT NULL,
    review_date DATE NOT NULL,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

if (mysqli_query($con, $sql)) {
    echo "Reviews table created or already exists.";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
?>
