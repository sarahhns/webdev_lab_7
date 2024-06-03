<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" id="matric" name="matric" required><br><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="lecturer">Lecturer</option>
            </select><br><br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
