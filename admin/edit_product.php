<?php include 'query/database.php'; ?>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $storage = $_POST['storage'];
    $category_id = $_POST['category_id'];

    // Handle Image Upload
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "../img/";
        $target_file = $target_dir . $id . ".jpg";  // Save the image as product ID.jpg

        $image_file_name = $id . ".jpg";
            $update_sql = "UPDATE products SET image='$image_file_name' WHERE id=$id";
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
            echo "Product image updated successfully";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    // Update product details without changing the image
    $sql = "UPDATE products SET name='$name', description='$description', price='$price',storage='$storage', category_id='$category_id' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("location: ad_dashboard.php");
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
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>

        <label>Description:</label>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br>

        <label>Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>"  required><br>
        <label>Storage:</label>
        <input type="text" name="storage" value="<?php echo $product['storage']; ?>"  required><br>

        <label>Category:</label>
        <select name="category_id">
            <?php
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $selected = $row['id'] == $product['category_id'] ? 'selected' : '';
                    echo "<option value='" . $row['id'] . "' $selected>" . $row['name'] . "</option>";
                }
            }
            ?>
        </select><br>

        <label>Current Image:</label><br>
        <img src="../img/<?php echo $product['id']; ?>.jpg" alt="Product Image" width="150"><br>

        <label>Upload New Image:</label>
        <input type="file" name="image" accept="image/*"><br>

        <button type="submit">Update Product</button>
    </form>
</body>

</html>