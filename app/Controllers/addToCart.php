<?php
session_start();

// Get product details from the request (e.g., from URL parameters or form data)
$productId = $_GET['product_id'];
$quantity = $_GET['quantity']; // Optional, if you allow users to specify quantity

// Fetch product details from the database
// Make sure to replace with your actual database connection and query
$mysqli = new mysqli('localhost', 'username', 'password', 'database');
if ($mysqli->connect_error) {
    die('Database connection failed: ' . $mysqli->connect_error);
}

$stmt = $mysqli->prepare('SELECT name, price FROM product_table WHERE id = ?');
$stmt->bind_param('i', $productId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $product['quantity'] = $quantity;

    // Initialize cart if not already
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to cart
    $_SESSION['cart'][] = $product;
}

$stmt->close();
$mysqli->close();

// Redirect to cart page
header('Location: cart.php');
exit;
?>
