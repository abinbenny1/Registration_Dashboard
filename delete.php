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
    <title>Delete Entry</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <div class="header">
        <h1>Delete Entry</h1>
    </div>
    <div class="container">
        <h2>Delete Entry</h2>
        <form action="delete.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Delete</button>
        </form>
        <form action="dashboard.php" method="get" class="form-container">
            <button type="submit">Back to Dashboard</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
            $username = $_POST['username'];

            $conn = new mysqli('localhost', 'root', 'root', 'crud_dashboard');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare statement to avoid SQL injection
            $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);

            if ($stmt->execute()) {
                echo "<span class='success-message'>Entry deleted successfully</span>";
                header("Refresh: 2; url=dashboard.php");
                exit();
            } else {
                echo "<span class='message'>Error: " . $stmt->error . "</span>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
