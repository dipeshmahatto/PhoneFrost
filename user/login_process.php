<?php
include '../admin/query/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = htmlspecialchars($_POST['email']);
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            header('Location: ../index.php');
            exit();
        } else {
            header("Location: user_login.php?error=" . urlencode("Invalid credentials"));
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
