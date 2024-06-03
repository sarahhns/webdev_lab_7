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

if (isset($_GET["matric"])) {
    $matric = $_GET["matric"];

    // Delete user
    $sql = "DELETE FROM users WHERE matric='$matric'";

    if ($conn->query($sql) === TRUE) {
        header("Location: display_users.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No matric provided.";
}

$conn->close();
?>
