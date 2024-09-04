<?php
include 'admin/query/database.php';
session_start();

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $quantity = intval($_POST['quantity']);
    
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += $quantity;
    } else {
        $_SESSION['cart'][$id] = $quantity;
    }

    // Redirect to avoid form resubmission
    header("Location: contentDetails.php?id=$id");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Content Details</title>
    <!-- favicon -->
    <link rel="icon"
        href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo"
        type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/contetDetails.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <!-- header links -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
</head>

<body>
    <!-- HEADER -->
    <div id="header"><?php include("header.php"); ?></div>

    <div id="containerProduct">
        <div id="containerD">
            <div id="imageSection">
                <img id="imgDetails" src="img/<?php echo htmlspecialchars($product['id']); ?>.jpg" alt="<?php echo htmlspecialchars($product['name']); ?>">
            </div>
            <div id="productDetails">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <div id="details">
                    <h3>Rs <?php echo number_format($product['price'], 2); ?></h3>
                    <h3>Description</h3>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </div>
                <!-- Add to Cart Form -->
                <form method="POST">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div id="footer"><?php include("footer.php"); ?></div>
</body>

</html>

<?php
$conn->close();
?>
