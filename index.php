<!DOCTYPE html>
<html>
    <head>
        <title>GoBook</title>
        <link rel="stylesheet" href ="style/mystyle.css">
    </head>
    <body>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include('includes/header.php');
    include('includes/content.php');
    include('includes/footer.php');
    ?>
    <script src="function.js"></script>
    </body>
</html>