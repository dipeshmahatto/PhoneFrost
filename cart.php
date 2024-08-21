<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cart | E-COMMERCE WEBSITE BY EDYODA </title>
    <link rel="stylesheet" href="css/cart.css">
    <!-- favicon -->
    <link rel="icon"
        href="https://yt3.ggpht.com/a/AGF-l78km1YyNXmF0r3-0CycCA0HLA_i6zYn_8NZEg=s900-c-k-c0xffffffff-no-rj-mo"
        type="image/gif" sizes="16x16">
    <!-- header links -->
    <script src="https://kit.fontawesome.com/4a3b1f73a2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

</head>

<body>
    <!-- HEADER -->
    <div id="1"><?php include("header.php") ?></div>

    <!-- CART CONTAINER -->
    <div id="cartMainContainer">
        <h1> Checkout </h1>
        <h3 id="totalItem"> Total Items: 0 </h3>

        <div id="cartContainer">
            <div id="cartContainer">
                <div id="boxContainer">
                    <div id="box"><img
                            src="img/a1.jpg">
                        <h3>Men Navy Blue Solid Sweatshirt × 1</h3>
                        <h4>Amount: Rs2599</h4>
                    </div>
                </div>
                <div id="totalContainer">
                    <div id="total">
                        <h2>Total Amount</h2>
                        <h4>Amount: Rs 31188</h4>
                        <div id="button"><button><a href="<?php echo "orderPlaced.php   " ?>">Place Order</a></button></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<!-- FOOTER -->
<div id="4"><?php include("footer.php") ?></div>

</html>