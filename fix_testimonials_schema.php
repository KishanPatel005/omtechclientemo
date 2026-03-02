<?php
include 'includes/conneaction.php';

// Check if column exists
$result = mysqli_query($con, "SHOW COLUMNS FROM testimonials LIKE 'rating'");
$exists = (mysqli_num_rows($result)) ? TRUE : FALSE;

if (!$exists) {
    $sql = "ALTER TABLE testimonials ADD COLUMN rating INT DEFAULT 5";
    if (mysqli_query($con, $sql)) {
        echo "Column 'rating' added successfully.";
    } else {
        echo "Error adding column: " . mysqli_error($con);
    }
} else {
    echo "Column 'rating' already exists.";
}
?>
