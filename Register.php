<!DOCTYPE HTML>
<html>  
    <head>
        <title>Registration page</title>
        <link rel="stylesheet" href ="style/mystyle.css">
    </head>

    <body>
        <header>        
            <h1>Register</h1>
        </header>

    <div class="content">
        <form id = "registrationForm" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
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

        <br>
        <a href = "index.php">Login</a>
    </div>

    <br>
    <?php include('includes/footer.php'); ?>

    
    <script>
        function validateForm() 
        {
            let isValid = true;

        //clear previous error messages
        document.querySelectorAll('#registrationForm div').forEach(function(div)
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
        else if (password.length < 8) {
            document.getElementById("pwError").textContent = "Password must be at least 8 characters long.";
            isValid = false;
        }

        // Submit the form if all validations pass
        if (isValid) {
            document.getElementById("registrationForm").submit();
        }
    }

</script>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle the form submission
            $name = $_POST['name'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['pw'];

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
        
            // Select the database
            $conn->select_db("GoBookDB");
        
            // Create table if it doesn't exist
            $sql = "CREATE TABLE IF NOT EXISTS UserInfo (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(255) NOT NULL,
                        dob DATE NOT NULL,
                        gender ENUM('Male', 'Female', 'Other') NOT NULL,
                        phone VARCHAR(15) NOT NULL,
                        email VARCHAR(255) NOT NULL,
                        password VARCHAR(255) NOT NULL
                    )";
            if ($conn->query($sql) === FALSE) 
            {
                echo "Error creating table: " . $conn->error;
            } 

            $checkQuery = "SELECT * FROM UserInfo WHERE email = '$email'";
            $checkResult = mysqli_query($conn, $checkQuery);
    
            if(mysqli_num_rows($checkResult) > 0)
            {
                echo 'Email already exists. Please use a different email. ';
            }
            else
            {
                $hashed_password= password_hash($password, PASSWORD_DEFAULT);

                // Insert the user data into the table
                $stmt = $conn->prepare("INSERT INTO UserInfo (name, dob, gender, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $dob, $gender, $phone, $email, $hashed_password);
        
                if ($stmt->execute()) 
                {
                    // Display success message and link back to index.php
                    echo "<script>
                    alert('Registration Successful! Your information has been successfully saved.');
                    window.location.href = 'index.php';
                    </script>";
                } else 
                {
                    echo "Error: " . $stmt->error;
                }
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        
        }
    ?>

</body>

</html>
