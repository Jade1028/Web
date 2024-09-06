<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href ="style/style1.css">
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
    <button type="submit">Login</button>
</form>
<br>
<p>Dont have an account? <a href = "Register.php">Register here</a></p>
</div>
</div>
</body>
</html>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    session_start();
}

if ($_SESSION['email']!="temporary")
{
    header('Location: index.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}
?>

