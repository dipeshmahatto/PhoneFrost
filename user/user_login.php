<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="../css/register.css">
    <script src=""></script>
    
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <form action="login_process.php" method="POST" onmouseenter="return Form()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" >
                <span></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" >
                <span></span>
            </div>
            <button type="submit" id="button">Login</button>
        </form>
    </div>

</body>
</html>
