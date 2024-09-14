<?php
include '../admin/query/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $hashed_password = md5($password);

    // Check if the email already exists
    $check_sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "Email already registered.";
    } else {
        // Insert query
        $insert_sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("sss", $name, $email, $hashed_password);

        if ($stmt->execute()) {
            header('Location: ../user/user_login.php');
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
