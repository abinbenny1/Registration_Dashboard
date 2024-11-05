<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Entry</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Update Entry</h1>
    </div>
    <div class="container">
        <h2>Update Entry Form</h2>
        <form action="update.php" method="post" class="form-container">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="email">New Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Update</button>
        </form>
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                // Update this line with your actual database credentials
                $conn = new mysqli('localhost', 'root', 'root', 'crud_dashboard');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE users SET email='$email', password='$password' WHERE username='$username'";
                if ($conn->query($sql) === TRUE) {
                    echo "<span class='success-message'>Entry updated successfully!</span>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>
        </div>
        <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </div>
</body>
</html>
