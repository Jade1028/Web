<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="/Web/style/mystyle.css">
<style>
.payment {
    min-height: 100vh;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    border: 1px solid #ddd;
}

</style>
</head>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/header.php');
?>

<body>
<div id="payment" class="payment">
<h1>Payment</h1>
    <form id="paymentForm" action="checkout.php" method="post">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <div id="nameError" class="error"></div>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <div id="emailError" class="error"></div>

    <label for="phone">Phone Number:</label>
    <input type="text" id="phone" name="phone">
    <div id="phoneError" class="error"></div>

    <label for="address">Shipping Address:</label>
    <input type="text" id="address" name="address">
    <div id="addressError" class="error"></div>

    <label for="paymentMethod">Payment Method:</label>
    <input type = "radio" id = "card" name = "payment">Debit/CreditCard <img src="../images/card.png" alt="img" style="width: 30px;
    height: 30px;">
    <input type = "radio" id = "tng" name = "payment">Touch N Go <img src="../images/tng.png" alt="img" style="width: 30px;
    height: 30px;">
    <input type = "radio" id = "tng" name = "payment">Online Banking <img src="../images/bank.png" alt="img" style="width: 30px;
    height: 30px;">
    <div id="paymentError"></div>

    <input type = "button" value="Check Out" onclick="checkOut()">
</div>
</form>

<script>
    function checkOut() 
    {
        let isValid = true;

        //clear previous error messages
        document.querySelectorAll('#paymentForm div').forEach(function(div)
        {
            div.textContent = '';
        });

        // Validate Name
        const name = document.getElementById("name").value;
        if (name.trim() === "") {
            document.getElementById("nameError").textContent = "Name is required.";
            isValid = false;
        }

        // Validate address
        const address = document.getElementById("address").value;
        if (address.trim() === "") {
            document.getElementById("addressError").textContent = "Address is required.";
            isValid = false;
        }

        // Validate Payment
        const gender = document.querySelector('input[name="payment"]:checked');
        if (gender === null) {
            document.getElementById("paymentError").textContent = "Please select a payment method.";
            isValid = false;
        }

        // Validate Phone Number
        const phone = document.getElementById("phone").value;
        if (phone.trim() === "") {
            document.getElementById("phoneError").textContent = "Phone number is required.";
            isValid = false;
        }

        // Validate Email
        const email = document.getElementById("email").value;
        const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (email.trim() === "") {
            document.getElementById("emailError").textContent = "Email address is required.";
            isValid = false;
        } else if (!email.match(emailPattern)) {
            document.getElementById("emailError").textContent = "Please enter a valid email address.";
            isValid = false;
        }

        // Submit the form if all validations pass
        if (isValid) {
            document.getElementById("paymentForm").submit();
        }
    }
</script>
<?php include('../includes/footer.php'); ?>

</body>
</html>