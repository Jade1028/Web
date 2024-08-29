<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us</title>
	<link rel="stylesheet" href ="../style/mystyle.css">
</head>
<body>
<?php include('../includes/header.php'); ?>

<div id="contact" class="content">
    <form id="contactForm" action="post-message.php" method="post">
	
        <label for="Sal">Salutation: </label>
        <select id="Sal" name="salutation">
		<option disabled selected value> -- Select a Salutation -- </option>
            <option value="mr">Mr</option>
            <option value="ms">Ms</option>
            <option value="mrs">Mrs</option>
            <option value="mdm">Mdm</option>
        </select>
        <div id="salutationError"></div>
        
        <label for="nam">Name: </label><input type="text" id="nam" name="name">
        <div id="nameError"></div>
        
        <label for="email">E-mail: </label><input type="text" id="email" name="email">
        <div id="emailError"></div>
        
        <label for="phone">Phone Number: </label><input type="tel" id="phone" name="phone">
        <div id="phoneError"></div>
        
        Type of Enquiry:
        <input type="checkbox" name="enquiry" value="General Enquiry"> General Enquiry
        <input type="checkbox" name="enquiry" value="Complaints"> Complaints
        <input type="checkbox" name="enquiry" value="Suggestions"> Suggestions
        <div id="enquiryError"></div>
        
        <label for="message">Subject:</label><br>
        <textarea id="message" name="message" rows="10" cols="30"></textarea>
        <div id="messageError"></div>
        <br>
        <input type="button" value="Send" onclick="validateForm()">
    </form>
</div>
<?php include('../includes/footer.php'); ?>
</body>