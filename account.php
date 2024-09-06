<?php
if (session_status() === PHP_SESSION_NONE) 
{
    session_set_cookie_params(0);
    session_start();
}

if ($_SESSION['email'] == "temporary")
{
    header('Location: login.php');
    exit();
}
?>

<div class = "content">
    <h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
    <p>Your account details:</p>
    <ul>
        <li>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></li>
        <li>Name: <?php echo htmlspecialchars($_SESSION['name']); ?></li>
        <li>Date of Birth: <?php echo htmlspecialchars($_SESSION['dob']); ?></li>
        <li>Gender: <?php echo htmlspecialchars($_SESSION['gender']); ?></li>
        <li>Phone: <?php echo htmlspecialchars($_SESSION['phone']); ?></li>
    </ul>
    <a href="/Web/logout.php">Logout</a>
</div>