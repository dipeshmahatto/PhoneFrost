<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="register.css">
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

    <script>
        function Form() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var span0 = document.getElementsByTagName("span")[0];
            var span1 = document.getElementsByTagName("span")[1];
            var isValid = true;

            span0.innerHTML = "";
            span1.innerHTML = "";

            if (email === "") {
                span0.innerHTML = "Please enter your email.";
                isValid = false;
            }

            if (password === "") {
                span1.innerHTML = "Please enter your password.";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>
