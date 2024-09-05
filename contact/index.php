<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Us</title>
	<link rel="stylesheet" href ="../style/mystyle.css">
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/header.php');?>
<h1>Contact Us</h1>

<div id="contact" class="content">
    <form id="contactForm" action="post-message.php" method="post">
	
        <label for="salutation">Salutation: </label>
        <select id="salutation" name="salutation" required>
		<option disabled selected value> -- Select a Salutation -- </option>
            <option value="mr">Mr</option>
            <option value="ms">Ms</option>
            <option value="mrs">Mrs</option>
            <option value="mdm">Mdm</option>
        </select>
        <div id="salutationError" class="error"></div>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required >
        <div id="nameError" class="error"></div>
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <div id="emailError" class="error"></div>
        
        <label for="phonenumber">Phone Number:</label>
        <input type="text" id="phonenumber" name="phonenumber" required>
        <div id="phoneError" class="error"></div>
        
        <label for="enquiry">Type of Enquiry:</label>
        <select id="enquirytype" name ="enquirytype" required>
        <option disabled selected value>Select an Option</option>
            <option value="general">General Enquiry</option>
            <option value="complaints">Complaints</option>
            <option value="suggestion">Suggestions/Feedback</option>
            <option value="customerservice">Customer Service</option>
        </select>
        <div id="enquiryError" class="error"></div>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="10" cols="50" placeholder="Enter your message here:"></textarea>
        <div id="messageError" class="error"></div>
        <br>
        <input type="button" value="Submit" onclick="submitForm()">
    </form>
</div>
<?php include('../includes/footer.php'); ?>
</body>

<script>
    function validateForm(){
	const errors={
		nameError:"",
        salutationError:"",
        emailError:"",
        phoneError:"",
        enquiryError:"",
        messageError:""
		};
	
	const name=document.getElementById("name").value.trim();
    const salutation=document.getElementById("salutation").value;
    const email=document.getElementById("email").value.trim();
    const phone=document.getElementById("phonenumber").value.trim();
    const enquiryType=document.getElementById("enquirytype").value;
    const message=document.querySelector('textarea[name="message"]').value.trim();
	
	if (name === ""){
		errors.nameError="Name is required.";
	}
	
	if (salutation === "") {
        errors.salutationError="Salutation is required.";
	}

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        errors.emailError="Please enter a valid email address.";
    }

    const phonePattern = /^[0-9]+$/;
    if (!phonePattern.test(phone)) {
        errors.phoneError="Phone number should contain only numbers.";
    }

    if (enquiryType === "") {
		errors.enquiryError="Please select an enquiry type.";
    }

    if (message === "") {
        errors.messageError="Message is required.";
    }
	
	document.getElementById("nameError").innerText=errors.nameError;
    document.getElementById("salutationError").innerText=errors.salutationError;
    document.getElementById("emailError").innerText=errors.emailError;
    document.getElementById("phoneError").innerText=errors.phoneError;
    document.getElementById("enquiryError").innerText=errors.enquiryError;
    document.getElementById("messageError").innerText=errors.messageError;
	
	return !(errors.nameError || errors.salutationError || errors.emailError || errors.phoneError || errors.enquiryError || errors.messageError);
}

 function handleSubmit() {
// Assuming this function is used for submitting the form
    const form = document.getElementById("contactForm");
    form.submit();
}

function submitForm() {
    if (validateForm()) {
		handleSubmit();
	}
}
</script>