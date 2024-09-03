<head>
<title>GoBook-Cart</title>
<link rel="stylesheet" href ="style/mystyle.css">
<style>
#cartTable{
    table{
	border: 5px solid rgb(0, 153, 0);
	border-spacing: 4px;
	padding: 2px;
	margin: none;
	border-collapse: separate;
}

caption{
	margin: none;
	padding: 10px;
	font: italic;
}

tr:nth-child(odd){
	background-color: rgb(217, 217, 217);
}

tr:nth-child(even){
	background-color: rgb(191, 191, 191);
}

th{
	margin: none;
	padding: 10px;
	color: rgb(255, 255, 255);
	background-color: rgb(51, 51, 153);
}

td{
	margin: none;
	padding: 10px;
}
}
</style>
</head>
<?php //include('includes/header.php');?>
<div class="shopping-cart">
    <h1>My Cart</h1>

<?php
session_start();
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
                    <td><img src="<?php echo htmlspecialchars($row['book_image']); ?>" alt="Product Image" width="100"></td>
                    <td><h2><?php echo htmlspecialchars($row['book_name']); ?></h2></td>
                    <td><?php echo 'RM ' . htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>
                        <!-- Form to Edit Quantity -->
                        <form action="update_cart.php" method="POST" style="display: inline;">
                            <input type="number" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" min="0" style="width: 60px;">
                            <input type="hidden" name="book_name" value="<?php echo htmlspecialchars($row['book_name']); ?>">
                            <button type="submit" class="edit-button">Edit</button>
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
        <form action="checkout.php" method="POST">
            <button type="submit" class="checkout-button">Proceed to Checkout</button>
        </form>
    </div>
</div>
<?php include('includes/footer.php');?>