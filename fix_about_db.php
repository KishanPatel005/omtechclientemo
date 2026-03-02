<?php
include 'includes/conneaction.php';

$sql = "CREATE TABLE IF NOT EXISTS about_us (
    id INT PRIMARY KEY,
    image1 VARCHAR(255),
    image2 VARCHAR(255),
    image3 VARCHAR(255),
    title VARCHAR(255),
    description TEXT
)";

if (mysqli_query($con, $sql)) {
    $check = mysqli_query($con, "SELECT id FROM about_us WHERE id = 1");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($con, "INSERT INTO about_us (id) VALUES (1)");
        echo "Table about_us created and record initialized.";
    } else {
        echo "Table already exists.";
    }
} else {
    echo "Error: " . mysqli_error($con);
}
?>
