<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="header">
        <h1>Register</h1>
    </div>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post" class="form-container">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <form action="dashboard.php" method="get" class="form-container">
            <button type="submit">Back to Dashboard</button>
        </form>
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $conn = new mysqli('localhost', 'root', 'root', 'crud_dashboard');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                if ($conn->query($sql) === TRUE) {
                    echo "<span class='success-message'>Registration successful!</span>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
            ?>
        </div>
    </div>
</body>
</html>
