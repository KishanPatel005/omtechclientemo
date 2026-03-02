<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include __DIR__ . '/../includes/conneaction.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS sliders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    headline VARCHAR(255) NOT NULL,
    sub_headline VARCHAR(255),
    credibility_line VARCHAR(255),
    button_link VARCHAR(255) DEFAULT 'products.php',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($con, $sql)) {
    echo "Success: sliders table created or already exists.\n";
} else {
    echo "Error: " . mysqli_error($con) . "\n";
}
?>
