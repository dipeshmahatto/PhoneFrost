<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form action="register_process.php" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" >
                <span id="span1"></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
                <span id="span2"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
                <span id="span3"></span>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" >
                <span id="span4"></span>
            </div>
            <span id="span5"></span>
            <button type="submit" id="button" onmouseenter="Form()">Register</button>
        </form>
    </div>

    <script src="../js/function.js"></script>
</body>
</html>
