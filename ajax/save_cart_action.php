<?php
session_start();
include '../includes/conneaction.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    
    // If session doesn't have details, get them from POST
    if (!isset($_SESSION['customer_info'])) {
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $delivery_address = mysqli_real_escape_string($con, $_POST['delivery_address']);
        
        $_SESSION['customer_info'] = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'delivery_address' => $delivery_address
        ];
    } else {
        $first_name = mysqli_real_escape_string($con, $_SESSION['customer_info']['first_name']);
        $last_name = mysqli_real_escape_string($con, $_SESSION['customer_info']['last_name']);
        $email = mysqli_real_escape_string($con, $_SESSION['customer_info']['email']);
        $phone = mysqli_real_escape_string($con, $_SESSION['customer_info']['phone']);
        $delivery_address = mysqli_real_escape_string($con, $_SESSION['customer_info']['delivery_address']);
    }

    if ($product_id > 0 && !empty($first_name)) {
        $sql = "INSERT INTO cart_added (first_name, last_name, email, phone, delivery_address, product_id) VALUES ('$first_name', '$last_name', '$email', '$phone', '$delivery_address', $product_id)";
        if (mysqli_query($con, $sql)) {
            echo json_encode(['status' => 'success', 'customer_captured' => true]);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($con)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing data']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
