<?php
include 'query/database.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("location: ad_dashboard.php?msg=Product deleted successfully");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
