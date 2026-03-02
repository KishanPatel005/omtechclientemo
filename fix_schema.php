<?php
include 'includes/conneaction.php';

function columnExists($con, $table, $column) {
    $res = mysqli_query($con, "SHOW COLUMNS FROM `$table` LIKE '$column'");
    return mysqli_num_rows($res) > 0;
}

$columns = [
    'price' => "DECIMAL(10,2) AFTER sku",
    'brand_name' => "VARCHAR(100) AFTER price",
    'status' => "ENUM('active', 'inactive') DEFAULT 'active' AFTER image4"
];

foreach ($columns as $col => $def) {
    if (!columnExists($con, 'products', $col)) {
        mysqli_query($con, "ALTER TABLE products ADD COLUMN $col $def");
        echo "Added $col\n";
    } else {
        echo "$col already exists\n";
    }
}
?>
