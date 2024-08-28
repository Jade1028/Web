
<div class = "content">
<form id="loginForm" method="post" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>

<a href = "Register.php">Register</a>
<div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);

    // Connect to the database and handle the login
    $servername = "localhost";
    $username = "root";
    $DBpassword = "";
    $database = "GoBookDB";

    $conn = new mysqli($servername, $username, $DBpassword, $database);

    // Validate login credentials (example)
    $stmt = $conn->prepare("SELECT password FROM UserInfo WHERE email = ?");
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

        if($hashed_password === $row['password'])
        {
            $stmt = $conn->prepare("SELECT * FROM UserInfo WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $userInfo = $stmt->get_result();
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

