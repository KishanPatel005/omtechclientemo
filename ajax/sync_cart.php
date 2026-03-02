<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_data = isset($_POST['cart']) ? $_POST['cart'] : [];
    
    // If it's a JSON string from AJAX, decode it
    if (is_string($cart_data)) {
        $decoded = json_decode($cart_data, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $cart_data = $decoded;
        }
    }
    
    $_SESSION['Omactuo_cart'] = $cart_data;
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
