<!DOCTYPE html>
<html>
<head>
    <title>Read Entries</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Read Entries</h1>
    </div>
    <div class="container dashboard">
        <h2>Entries List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php
            $conn = new mysqli('localhost', 'root', 'root', 'crud_dashboard');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, username, email FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td><button onclick=\"location.href='update.php?id=" . $row['id'] . "'\">Update</button> </td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No entries found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
    <form action="dashboard.php" method="get" class="form-container">
            <button type="submit">Back to Dashboard</button>
        </form>
</body>
</html>
