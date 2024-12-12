<?php include 'query/database.php'; 

if($_SESSION['Adminloggedin'] = false)
    header('location:index.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Dashboard</title>

</head>

<body>


    <h1> <b>Admin Dashboard </b></h1>
    <hr>
    <div id="adminnav">
        <a href="add_product.php">
            <button type="button">Add New Product</button>
        </a>
        <a id="leftbutton" href="../index.php">
            <button type="button">Homepage</button>
        </a>
        <a id="leftbutton" href="orders.php">
            <button type="button">Orders</button>
        </a>
        <a href="../logout.php">
            <button type="button">logout</button>
        </a>
    </div>

    <h2>Smartphones</h2>
    <hr>
    <div>
        <!-- <a href="../class/smartphone.php">Smartphone</a> -->
        <!-- <a href="headphones.php">Headphones</a> -->
    </div>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Storage</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT products.id, products.name, products.storage, products.description, products.price, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE categories.name = 'Smartphone'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['storage'] . "</td>";
                echo "<td id='des'>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td><img id='product_img' src='../img/" . $row['id'] . ".jpg' alt='Image not found'></td>";
                echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_product.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found</td></tr>";
        }
        ?>
    </table><br><br>
    <h2>Earpods</h2>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Storage</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT products.id, products.name, products.storage, products.description, products.price, categories.name AS category_name FROM products LEFT JOIN categories ON products.category_id = categories.id WHERE categories.name != 'Smartphone'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['storage'] . "</td>";
                echo "<td id='des'>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td><img id='product_img' src='../img/" . $row['id'] . ".jpg' alt='Image not found'></td>";
                echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_product.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found</td></tr>";
        }
        ?>
    </table>
</body>

</html>