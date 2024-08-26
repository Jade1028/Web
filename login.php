
<form id="loginForm" method="post" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>



<script>
    document.getElementById('avatar').onclick = function() 
    {
        document.getElementById('loginPopup').style.display = 'block';
    };

    document.querySelector('.close').onclick = function() 
    {
        document.getElementById('loginPopup').style.display = 'none';
    };

    window.onclick = function(event) 
    {
        if (event.target == document.getElementById('loginPopup')) 
        {
            document.getElementById('loginPopup').style.display = 'none';
        }
    };
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

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

        if(password_verify($password, $row['password']))
        {
            $stmt = $conn->prepare("SELECT * FROM UserInfo WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $userInfo = $stmt->get_result();
            echo $userInfo;
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

