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

$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Display Users</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>User List</h2>
        <?php
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Matric</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["matric"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["role"]. "</td>
                        <td class='action-buttons'>
                            <a class='update' href='update_user.php?matric=" . $row["matric"] . "'>Update</a>
                            <a class='delete' href='delete_user.php?matric=" . $row["matric"] . "'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
