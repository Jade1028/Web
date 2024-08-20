<!DOCTYPE HTML>
<html>  
    <head>
        <title>Contact Us</title>
        <link rel="stylesheet" href ="style/mystyle.css">
    </head>

    <body>
        
    <h1>Register</h1>

    <div id="contentWrapper1" class="content">
        <form id = "registrationForm" action = "post-message.php" method = "post">
            <label for = "name"> Name: </label>
            <input type = "text" id = "name" name = "name">
            <div id = "nameError"></div>
            <br>

            <label for = "dob"> Date of Birth: </label>
            <input type = "date" id = "dob" name = "dob">
            <div id = "dobError"></div>
            <br>

            Gender:  
            <input type = "radio" id = "male" name = "gender"> Male
            <input type = "radio" id = "female" name = "gender"> Female
            <input type = "radio" id = "other" name = "gender"> Other
            <div id = "genderError"></div>

            <label for = "phone"> Phone Number: </label>
            <input type = "tel" id = "phone" name = "phone">
            <div id = "phoneError"></div>
            <br>

            <label for = "email"> Email Address: </label>
            <input type = "text" id = "email" name = "email">
            <div id = "emailError"></div>
            <br>

            <label for = "pw"> Password: </label>
            <input type = "password" id = "pw" name = "pw">
            <div id = "pwError"></div>
            <br>

            <br><br>
            <input type = "button" value="Send" onclick="validateForm()">
        </form>
    </div>

    <br>
    <?php include('includes/footer.php'); ?>

    <!--
    <script>
        function validateForm() 
        {
            let isValid = true;

        //clear previous error messages
        document.querySelecorAll('#registrationForm div').forEach(function(div)
        {
            div.textContent = '';
        });

    // Validate Name
    const name = document.getElementById("name").value;
    if (name.trim() === "") {
        document.getElementById("nameError").textContent = "Name is required.";
        isValid = false;
    }

    // Validate Date of Birth
    const dob = document.getElementById("dob").value;
    if (dob.trim() === "") {
        document.getElementById("dobError").textContent = "Date of Birth is required.";
        isValid = false;
    }

    // Validate Gender
    const gender = document.querySelector('input[name="gender"]:checked');
    if (gender === null) {
        document.getElementById("genderError").textContent = "Gender is required.";
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

    // Validate Password
    const password = document.getElementById("pw").value;
    if (password.trim() === "") {
        document.getElementById("pwError").textContent = "Password is required.";
        isValid = false;
    }

    // Submit the form if all validations pass
    if (isValid) {
        document.getElementById("registrationForm").submit();
    }
}
-->

</body>

</html>
