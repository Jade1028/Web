<!DOCTYPE html>
<html>
<head>
<title>GoBook-Cart</title>
<link rel="stylesheet" href ="../style/mystyle.css">
<style>
h1 {
    font-size: 24px;
    color: #333;
}

.shopping-cart {
    min-height: 100vh;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    border: 1px solid #ddd;
}

.shopping-cart h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table thead {
    background-color: #007bff;
    color: #fff;
}

table th,
table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    font-size: 18px;
}

table td {
    font-size: 16px;
    vertical-align: middle;
}

table img {
    max-width: 100px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

table input[type="number"] {
    width: 60px;
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}

table button{
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

table button:hover {
    background-color: #0056b3;
}

.h3 {
    text-align: right;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 0;
    color: #333;
    border-top: 1px solid #ddd;
}

.checkout-button {
    display: block;
    width: 100%;
    text-align: center;
    padding: 10px 20px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.checkout-button:hover {
    background-color: #218838;
}

</style>
</head>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    session_start();
}
include('../includes/header.php');
?>
<body>
<div class="shopping-cart">
    <h1>My Cart</h1>
<?php

$servername = "localhost";
$username = "root";
$DBpassword = "";

$conn = new mysqli($servername, $username, $DBpassword);

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS GoBookDB";
if ($conn->query($sql) === FALSE) 
{
    echo "Error creating database: " . $conn->error;
}

$conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');
$email = $_SESSION['email'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM Cart WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $grandTotal = 0; // Initialize grand total variable
    ?>
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Book Images</th>
                    <th>Book Name</th>
                    <th>Price per item</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Loop through each product and display it
            while ($row = $result->fetch_assoc()) {
                $totalPrice = $row['price'] * $row['quantity']; // Calculate total price for each item
                $grandTotal += $totalPrice; // Add to grand total
            ?>
                <tr>
                    <td><img src="../<?php echo htmlspecialchars($row['book_image']); ?>" alt="Product Image" width="100"></td>
                    <td><h2><?php echo htmlspecialchars($row['book_name']); ?></h2></td>
                    <td><?php echo 'RM ' . htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>
                        <!-- Form to Edit Quantity -->
                        <form action="update_cart.php" method="POST" style="display: inline;">
                            <input type="number" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" min="0">
                            <input type="hidden" name="book_name" value="<?php echo htmlspecialchars($row['book_name']); ?>">
                            <button type="edit" class="edit-button">Edit</button>
                        </form>
                    </td>
                    <td><?php echo 'RM ' . htmlspecialchars($totalPrice); ?></td> <!-- Display total price -->
                </tr>
                <tr>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="5" style="text-align: right;"><h3>Grand Total:</h3></td>
                <td><p>RM: <?php echo $grandTotal?></p></td>
                </tr>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

    <!-- Proceed to Checkout Button -->
    <div class="checkout">
        <form action="payment.php" method="POST">
            <button type="submit" class="checkout-button">Proceed to Checkout</button>
        </form>
    </div>
</div>
<?php include('../includes/footer.php'); ?>
</body>
</html>