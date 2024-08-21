<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="../css/login.css"/>
  <script src="../../js/admin_login_validate.js"></script>
  <script src="../../js/error.js"></script>
</head>
<body>
  <div class="container">
    <h1>Admin</h1>
    <form action="query/ad_login_process.php" method="post">
      <div class="login_box">
        <div class="input">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter Username" />
        </div>
        <div class="input">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter Password" />
        </div>
        <span id="error-message" style="color: red;"></span>
      </div>
      <div class="submit">
        <input type="submit" value="Login">
      </div>
      <div class="home">
        <a href="../index.php">Home</a>
      </div>
    </form>
  </div>
</body>

</html>