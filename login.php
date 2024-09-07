<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href ="/style/style1.css">
    </head>
<body>
<div class="container">
<h1>Welcome to GoBook!</h1>
<div class = "content">
<form id="loginForm" method="post" action="">
    <label for="email"></label>
    <input type="email" id="email" name="email" placeholder="Email" required>
    <label for="password"></label>
    <input type="password" id="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login" name="login" class="login">
</form>
<br>
<p>Dont have an account? <a href = "/Web/Register.php">Register here</a></p>
</div>
</div>
</body>
</html>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['email'])){
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Connect to the database and handle the login
        $servername = "localhost";
        $username = "root";
        $DBpassword = "";
        $database = "GoBookDB";

        $conn = new mysqli($servername, $username, $DBpassword, $database);

        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS UserInfo (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            dob DATE NOT NULL,
            gender ENUM('Male', 'Female', 'Other') NOT NULL,
            phone VARCHAR(15) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";

        if ($conn->query($sql) === FALSE) 
        {
            echo "Error creating table: " . $conn->error;
        } 

        // Validate login credentials (example)
        $stmt = $conn->prepare("SELECT * FROM UserInfo WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) 
        {
            echo "<script>alert('Email not found. Please try again or create a new account. ');</script>";
        } 
        else
        {
            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password']))
            {
                $_SESSION['name'] = $row['name'];
                $_SESSION['dob'] = $row['dob'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['pw'] = $row['pw'];
                $_SESSION['logged_in'] = true;

                echo "<script>
                alert('Successfully logged in. ');
                window.location.href = 'index.php';
                </script>";
            }
            else
            {
                echo "<script>alert('Incorrect password. Please try again. ');</script>";
            }
        } 

    $stmt->close();
    $conn->close();
    } else{
       echo "<script>alert('Please login to add products to cart!'); window.location.href = 'index.php';</script>";
    }
    
}else{
    echo'';
}
?>

