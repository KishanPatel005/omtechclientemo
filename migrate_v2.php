<?php
include 'includes/conneaction.php';

$sql = "ALTER TABLE products 
        ADD COLUMN price DECIMAL(10,2) AFTER sku, 
        ADD COLUMN brand_name VARCHAR(100) AFTER price,
        ADD COLUMN status ENUM('active', 'inactive') DEFAULT 'active' AFTER image4";

if (mysqli_query($con, $sql)) {
    echo "Columns added successfully";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
