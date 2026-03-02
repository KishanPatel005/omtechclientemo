<?php
include 'includes/conneaction.php';
$sql = "CREATE TABLE IF NOT EXISTS about_us (
    id INT PRIMARY KEY DEFAULT 1,
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255)
)";
if (mysqli_query($con, $sql)) {
    // Check if a row exists, if not insert default one
    $check = mysqli_query($con, "SELECT * FROM about_us WHERE id = 1");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($con, "INSERT INTO about_us (id) VALUES (1)");
    }
    echo "Table created and initialized successfully";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
