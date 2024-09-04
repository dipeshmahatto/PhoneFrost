<?php include 'query/database.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $storage = $_POST['storage'];

    // Insert product details first to get the product ID
    $sql = "INSERT INTO products (name, description, price,storage, category_id) VALUES ('$name', '$description', '$price','$storage', '$category_id')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;  // Get the last inserted ID (product ID)

        // Handle Image Upload
        if (!empty($_FILES["image"]["name"])) {
            $target_dir = "../img/";
            $target_file = $target_dir . $last_id . ".jpg";  // Save the image as product ID.jpg
            $image_file_name = $last_id . ".jpg";
            $update_sql = "UPDATE products SET image='$image_file_name' WHERE id=$last_id";
            $conn->query($update_sql);
            // Check if image file is a valid image type
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image.";
                exit;
            }

            // Check file size (limit to 5MB)
            if ($_FILES["image"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                exit;
            }

            // Allow certain file formats (e.g., JPG, PNG, JPEG, GIF)
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                exit;
            }

            // Move uploaded file and rename it to product ID.jpg
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                header("location: ad_dashboard.php");
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Product</title>
</head>

<body>
    <h1>Add Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Price:</label>
        <input type="number" name="price" required><br>
        <label>Storage:</label>
        <input type="text" name="storage" required><br>
        <label>Category:</label>
        <select name="category_id">
            <?php
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select><br>
        <label>Product Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        <button type="submit">Add Product</button>
    </form>
</body>

</html>