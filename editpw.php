<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="/Web/style/style1.css">
</head>
<body>

    <div class="formcontainer">
        <div class="content">
            <a href="index.php">&laquo; Back</a>
            <form id="editpw" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                <h1>Password Reset</h1>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="pw">New Password:</label>
                <input type="password" id="pw" name="password" required>
                <div id="pwError"></div>

                <input type="submit" value="Reset password">
            </form>
        </div>
    </di>

    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('pw').value;
            var errorDiv = document.getElementById('pwError');

            if (email === "" || password.length < 8) {
                errorDiv.textContent = "Please enter a valid email and password must be at least 8 characters long.";
                return false;
            }

            errorDiv.textContent = ""; // Clear any previous error message
            return true; // Allow form submission
        }
    </script>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password']; // Match the name attribute in the form
        
        // Check if email exists in the database
        $stmt = $conn->prepare("SELECT * FROM userinfo WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Email exists, update the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
            $stmt = $conn->prepare("UPDATE userinfo SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashedPassword, $email);
    
            if ($stmt->execute()) {
                echo "<script>alert('Password updated successfully.'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Error updating password.');</script>";
            }
        } else {
            echo "<script>alert('Email not found.');</script>";
        }
    }
    ?>
</body>
</html>