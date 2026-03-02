<?php
include '../includes/conneaction.php';

$res = mysqli_query($con, "DESCRIBE cart_added");
$columns = [];
while($row = mysqli_fetch_assoc($res)) {
    $columns[] = $row['Field'];
}

if (!in_array('delivery_address', $columns)) {
    $sql = "ALTER TABLE cart_added ADD COLUMN delivery_address TEXT AFTER phone";
    if (mysqli_query($con, $sql)) {
        echo "Success: Column added.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Column already exists.";
}
?>
