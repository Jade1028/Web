<!DOCTYPE html>
<html>
<head>
<title>Check Out</title>
<link rel="stylesheet" href="/Web/style/mystyle.css">
</head>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');
$email = $_SESSION['email'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $email = $_SESSION['email'];
    $sql = "DELETE FROM Cart WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
?>
<body>
<h1>Your order has been sent! Thanks for choosing us, have a nice day !<br>
You will be redirected back to the home page shortly!</h1>

<script>
setTimeout(function(){
	window.location.href = '/Web/index.php';
}, 5000); // 5000 milliseconds = 5 seconds
</script>
</body>
