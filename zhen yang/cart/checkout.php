<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<link rel="stylesheet" href="/Web/style/mystyle.css">
<style>
.button {
    background-color:#4CAF50; 
    border:none;
    color:white; 
    padding:15px 32px; 
    text-align:center; 
    text-decoration:none; 
    display: inline-block; 
    font-size: 16px; 
    margin: 4px 2px; 
    cursor: pointer; 
    border-radius: 4px; 
    transition: background-color 0.3s; 
}

.button:hover {
    background-color: #45a049;
}

.button:disabled {
    background-color: #d3d3d3;
    cursor: not-allowed; 
}
</style>
</head>

<body>
<h1>Payment</h1>
<div id="contentWrapper1" class="content">
<form id="paymentForm">
<label for="name">Full Name:</label>
<input type="text" id="name" name="name" required>
<br>
<label for="email">Email Address:</label>
<input type="text" id="email" name="email" required>
<br>
<label for="phone">Phone Number:</label>
<input type="tel" id="phone" name="phone" required>
<br>
<label for="address">Shipping Address:</label>
<input type="text" id="address" name="address" required>
<br>
<label for="paymentMethod">Payment Method:</label>
<select id="paymentMethod" name="paymentMethod">
<option value="">Select Payment Method</option>
<option value="debit/credit">Debit/Credit Card</option>
<option value="tng">Touch N Go</option>
</select>
<br>
<br>
<label for="cardnumber">Card Number:</label>
<input type="text" id="cardnumber" name="cardnumber" placeholder="1234 5678 9012 3456">
<br>
<label for="expirydate">Expiry Date:</label>
<input type="text" id="expirydate" name="expirydate" placeholder="MM/YY">
<br>
<label for="cvv">CVV:</label>
<input type="text" id="cvv" name="cvv" placeholder="123">
<br>

</div>
<button type="submit" class="button" onclick="return validateForm()">Submit Payment</button>
</form>

<?php include('includes/footer.php'); ?>

</body>
</html>