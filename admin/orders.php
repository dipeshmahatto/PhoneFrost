<?php
include 'query/database.php';
session_start();

// Fetch all orders
$sql = "SELECT * FROM orders";
$stmt = $conn->prepare($sql);
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
    <title>All Orders</title>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="css/orders.css">
    <style>
        #image {
            height: 80px;
        }

        table {
            width: 90%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <div id="header"><section>
            <!-- MAIN CONTAINER -->
            <div id="containerr">
                <!-- SHOP logo -->
                <a href="../index.php"><img id="logo" src="../img/logo.png" alt="PhoneFrost"></a>
                <!-- COLLECTIONS ON WEBSITE -->
                <div id="collection">
                    <div id="smartphones"><a href="#Smartphones">SMARTPHONES</a></div>
                    <div id="accessories"><a href="#Accessories">ACCESSORIES</a></div>
                </div>
                <!-- SEARCH SECTION -->
                <div id="search">
                    <i class="fas fa-search search"></i>
                    <input type="text" id="input" name="searchBox" placeholder="Search for Smartphones and Accessories">
                </div>
                <!-- USER SECTION (CART AND USER ICON) -->
                <div id="user">
                    <?php if (isset($_SESSION['Adminloggedin'])): ?>
                        <a href="" class="userIcon">👤</a>
                        <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span> 
                        <a href="../logout.php">Logout</a>
                        
                    <?php else: ?>
                        <a href="user/user_login.php">Login</a>
                        <a href="admin/ad_login.php">Admin</a> 
                    <?php endif; ?>
                </div>
                
            </div>
        </section></div>

    <div id="ordersContainer">
        <h1>All Orders</h1>

        <?php if (!empty($orders)): ?>
            <table style="margin: auto; margin-bottom: 50px; text-align: center;">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Name</th>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_id']); ?></td>
                            <td>
                                <img id="image" src="../img/<?php echo htmlspecialchars($order['product_id']); ?>.jpg"
                                    alt="Product Image">
                            </td>
                            <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </div>

    <!-- FOOTER -->
    <div id="footer"><?php include("../footer.php"); ?></div>
</body>

</html>