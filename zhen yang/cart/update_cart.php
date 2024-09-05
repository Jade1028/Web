<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email'];
    $bookName = $_POST['book_name'];
    $newQuantity = $_POST['quantity'];

    if ($newQuantity > 0) {
        // Update the quantity in the Cart table if it's greater than 0
        $sql = "UPDATE Cart SET quantity = ? WHERE email = ? AND book_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $newQuantity, $email, $bookName);
    } else {
        // Delete the product from the Cart if the quantity is 0 or less
        $sql = "DELETE FROM Cart WHERE email = ? AND book_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $bookName);
    }

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect back to the cart page to refresh it
        exit();
    } else {
        echo "Error updating cart: " . $conn->error;
    }
}

?>