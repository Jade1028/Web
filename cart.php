<title>GoBook-Cart</title>


<div class="shopping-cart">
    <h1>My Cart</h1>

    <table>
        <thead>
            <th>Book Images</th>
            <th>Book Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </thead>

        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $email = $_SESSION['email'];        
        $conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');
             
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE email = '$email'")
        ?>
    </table>
</div>
