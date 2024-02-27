<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($_GET['error'])) { ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <form action="login.php" method="post">
        <label for="uname">Username</label><br>
        <input type="text" id="uname" name="uname"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
