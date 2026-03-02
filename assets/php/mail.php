<?php
include '../../includes/conneaction.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con, $_POST['con_name']);
    $email = mysqli_real_escape_string($con, $_POST['con_email']);
    $subject = mysqli_real_escape_string($con, $_POST['con_subject']);
    $message = mysqli_real_escape_string($con, $_POST['con_message']);

    $sql = "INSERT INTO inquiries (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($con, $sql)) {
        // echo "success";
            echo "<script>
        alert('We will reach out to you soon');
        window.location.href = '../../contact-us.php';
    </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Invalid request";
}
?>