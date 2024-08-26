<?php
// session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Count the total number of items in the cart
$totalItems = array_sum($_SESSION['cart']);
?>
<header>
    <section>
        <!-- MAIN CONTAINER -->
        <div id="container">
            <!-- SHOP logo -->
            <a href="index.php"><img id="logo" onclick="home()" src="img/logo.png" alt="PhoneFrost"></a>
            <!-- COLLCETIONS ON WEBSITE -->
            <div id="collection">
                <div id="smartphones"><a href="#Smartphones"> SMARTPHONES </a></div>
                <div id="accessories"><a href="#Accessories"> ACCESSORIES </a></div>
            </div>
            <!-- SEARCH SECTION -->
            <div id="search">
                <i class="fas fa-search search"></i>
                <input type="text" id="input" name="searchBox" placeholder="Search for Smartphones and Accessories">
            </div>
            <!-- USER SECTION (CART AND USER ICON) -->
            <div id="user">
                <a href="cart.php">
                    <i class="fas fa-shopping-cart addedToCart">
                        <div id="badge"><?php echo $totalItems; ?></div>
                    </i>
                </a>
                <a href="#"> <i class="fas fa-user-circle userIcon"></i> </a>
            </div>
        </div>

    </section>
</header>