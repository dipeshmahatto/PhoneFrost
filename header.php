
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
</head>

<body id="bd">
    <header>
        <section>
            <!-- MAIN CONTAINER -->
            <div id="containerr">
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
                            
                        </i>
                    </a>
                    <a href="#"> <i class="fas fa-user-circle userIcon"></i> </a>
                </div>
            </div>

        </section>
    </header>
</body>

</html>