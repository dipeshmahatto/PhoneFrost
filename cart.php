<?php
include 'admin/query/database.php';
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle quantity reduction and cart display
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update_cart') {
    foreach ($_POST['quantity'] as $productId => $quantity) {
        $quantity = intval($quantity);
        if ($quantity > 0) {
            $_SESSION['cart'][$productId] = $quantity;
        } else {
            unset($_SESSION['cart'][$productId]); // Remove item if quantity is 0 or less
        }
    }
    echo json_encode(['status' => 'success']);
    exit;
}

$cartItems = $_SESSION['cart'];
$totalAmount = 0;

if (!empty($cartItems)) {
    $ids = implode(',', array_keys($cartItems));
    $sql = "SELECT * FROM products WHERE id IN ($ids)";
    $result = $conn->query($sql);
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="icon"
        href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo"
        type="image/gif" sizes="16x16">
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <!-- HEADER -->
    <div id="header"><?php include("header.php"); ?></div>

    <!-- CART CONTAINER -->
    <div id="cartMainContainer">
        <h1>Cart</h1>
        <h3 id="totalItem">Total Items: <?php echo count($cartItems); ?></h3>

        <div id="cartContainer">
            <?php if ($products): ?>
                <?php foreach ($products as $product): ?>
                    <div id="boxContainer">
                        <div id="box">
                            <img id="cartimg" src="img/<?php echo htmlspecialchars($product['id']); ?>.jpg" alt="<?php echo htmlspecialchars($product['name']); ?>">
                            <h3><?php echo htmlspecialchars($product['name']); ?> × 
                                <input type="number" class="quantity" data-product-id="<?php echo $product['id']; ?>" value="<?php echo htmlspecialchars($cartItems[$product['id']]); ?>" min="1" required>
                            </h3>
                            <h4>Amount: Rs <?php echo number_format($product['price'] * $cartItems[$product['id']], 2); ?></h4>
                        </div>
                        <?php $totalAmount += $product['price'] * $cartItems[$product['id']]; ?>
                    </div>
                <?php endforeach; ?>
                <div id="totalContainer">
                    <div id="total">
                        <h2>Total Amount</h2>
                        <h4>Amount: Rs <?php echo number_format($totalAmount, 2); ?></h4>
                        <div id="button">
                            <button><a href="orderPlaced.php">Place Order</a></button>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- FOOTER -->
    <div id="footer"><?php include("footer.php"); ?></div>

    <script>
    $(document).ready(function() {
        $('.quantity').on('change', function() {
            var quantity = $(this).val();
            var productId = $(this).data('product-id');

            $.ajax({
                url: 'cart.php',
                method: 'POST',
                data: {
                    action: 'update_cart',
                    quantity: {
                        [productId]: quantity
                    }
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        location.reload(); // Reload the page to reflect the changes
                    }
                }
            });
        });
    });
    </script>
</body>

</html>

<?php
$conn->close();
?>
