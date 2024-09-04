<?php
include 'admin/query/database.php';

// Fetch Smartphones
$smartphones = $conn->query("SELECT * FROM products WHERE category_id = 1");

// Fetch Accessories (Headphones and Earpods)
$accessories = $conn->query("SELECT * FROM products WHERE category_id IN (2, 3)");
?>

<div id="mainContainer">

    <!-- Smartphones Section -->
    <h1 id="Smartphones"> Smartphones </h1>
    <div id="containersmartphones">
        <?php while($row = $smartphones->fetch_assoc()) { ?>
            <div id="box">
                <a href="contentDetails.php?id=<?php echo $row['id']; ?>">
                    <img id="image" src="img/<?php echo $row['id']; ?>.jpg" alt="<?php echo $row['name']; ?>">
                    <div id="details">
                        <h3><?php echo $row['name']; ?></h3>
                        <h3><?php echo "Storage: ".$row['storage']; ?></h3>
                        <h2>rs <?php echo number_format($row['price'], 2); ?></h2>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

    <!-- Accessories Section -->
    <h1 id="Accessories"> Accessories for men and women </h1>
    <div id="containerAccessories">
        <?php while($row = $accessories->fetch_assoc()) { ?>
            <div id="box">
                <a href="contentDetails.php?id=<?php echo $row['id']; ?>">
                    <img src="img/<?php echo $row['id']; ?>.jpg" alt="<?php echo $row['name']; ?>">
                    <div id="details">
                        <h3><?php echo $row['name']; ?></h3>
                        <h4><?php echo $row['description']; ?></h4>
                        <h2>rs <?php echo number_format($row['price'], 2); ?></h2>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>

</div>

<?php
$conn->close();
?>
