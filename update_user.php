<?php
session_start();

if (!isset($_SESSION['matric'])) {
    header("Location: login_page.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lab_7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["matric"])) {
    $matric = $_GET["matric"];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $role = $row["role"];
    } else {
        echo "User not found.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST["matric"];
    $name = $_POST["name"];
    $role = $_POST["role"];

    $sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_users.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_user.php" method="post">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" value="<?php echo $matric; ?>" readonly><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="student" <?php if($role == 'student') echo 'selected'; ?>>Student</option>
            <option value="lecturer" <?php if($role == 'lecturer') echo 'selected'; ?>>Lecturer</option>
        </select><br><br>
        <input type="submit" value="Update">
        <a href="display_users.php">Cancel</a>
    </form>
</body>
</html>
