<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    $login = "Login";
    $name = "";
} else {
    $login = "Logout";
    $name = $_SESSION['user_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Header</title>
</head>

<body id="bd">
    <header>
        <section>
            <!-- MAIN CONTAINER -->
            <div id="containerr">
                <!-- SHOP logo -->
                <a href="index.php"><img id="logo" src="img/logo.png" alt="PhoneFrost"></a>
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
                    <?php if ($name): ?>
                        <span><?php echo htmlspecialchars($name); ?></span>
                        <a href="logout.php">Logout</a>
                    <?php else: ?>
                        <a href="user/user_login.php"><?php echo $login; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </header>
</body>

</html>
