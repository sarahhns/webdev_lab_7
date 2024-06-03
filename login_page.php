<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="matric">Matric:</label>
                <input type="text" id="matric" name="matric" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" value="Login">
            </form>
            <p>Register <a href="registration_page.php">here</a> if you have not.</p>
        </div>
    </div>
</body>
</html>
