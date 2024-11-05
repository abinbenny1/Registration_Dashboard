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
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <a href="create.php">Create Entry</a>
        <a href="read.php">View Entries</a>
        <a href="update.php">Update Entries</a>
        <a href="delete.php">Delete Entries</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
