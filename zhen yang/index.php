<!DOCTYPE html>
<html>
    <head>
        <title>GoBook</title>
        <link rel="stylesheet" href ="/Web/style/mystyle.css">
        <script src="https://kit.fontawesome.com/88976616f3.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['email'])){
        header('Location: login.php');
        exit();
    }

    include('../Web/includes/header.php');
    include('../Web/includes/content.php');
    include('../Web/includes/footer.php');
    ?>
    <script src="function.js"></script>
    </body>
</html>