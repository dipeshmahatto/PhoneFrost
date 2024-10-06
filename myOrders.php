<?php
include 'admin/query/database.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

$userName = $_SESSION['user_name'];

// Fetch the user's orders
$sql = "SELECT * FROM orders WHERE customer_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $userName);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="css/orders.css">
</head>

<body>
    <!-- HEADER -->
    <div id="header"><?php include("header.php"); ?></div>

    <div id="ordersContainer">
        <h1>My Orders</h1>

        <?php if (!empty($orders)): ?>
            <table border="1" cellpadding="10">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You have no orders yet.</p>
        <?php endif; ?>
    </div>

    <!-- FOOTER -->
    <div id="footer"><?php include("footer.php"); ?></div>
</body>

</html>
