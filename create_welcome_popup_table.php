<?php
include 'includes/conneaction.php';

$sql = "CREATE TABLE IF NOT EXISTS welcome_popup (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) DEFAULT '',
    description TEXT,
    is_active TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($con, $sql)) {
    // Check if initial record exists
    $check = mysqli_query($con, "SELECT id FROM welcome_popup WHERE id = 1");
    if (mysqli_num_rows($check) == 0) {
        mysqli_query($con, "INSERT INTO welcome_popup (id, title, description, is_active) VALUES (1, 'Welcome to Omactuo!', 'Explore our industrial automation solutions.', 0)");
    }
    echo "Welcome popup table and initial record created.";
} else {
    echo "Error: " . mysqli_error($con);
}
?>
