<?php
include 'admin/query/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming customer name is stored in session after login
    $customerName = $_SESSION['user_name']; // Replace this with the actual session variable
    $cartItems = $_SESSION['cart'];
    
    if (!empty($cartItems)) {
        // Insert each product in the cart into the 'orders' table
        foreach ($cartItems as $productId => $quantity) {
            $sql = "INSERT INTO orders (customer_name, product_id, quantity, order_date) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sii', $customerName, $productId, $quantity);

            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
                $stmt->close();
                $conn->close();
                exit;
            }
        }

        // Clear the cart after successful order
        unset($_SESSION['cart']);

        // Redirect to a success page
        header('Location: orderSuccess.php');
    } else {
        echo "Your cart is empty!";
    }
} else {
    // Redirect to cart page if accessed without a POST request
    header('Location: cart.php');
}

$conn->close();
?>
