<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="/Web/style/style1.css">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
    <div class="formcontainer">
        <div class="content">
        <a href="index.php">&laquo; Back</a>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h1>Edit Profile</h1>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION['name']); ?>">
                <div id = "nameError"></div>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($_SESSION['phone']); ?>">

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($_SESSION['dob']); ?>">

                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">

                <button type="submit" name="update">Update Profile</button>
            </form>
        </div>
    </div>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'GoBookDB');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_SESSION['email'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $new_password = $_POST['password'];
    
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['dob'] = $dob;
    
        if (!empty($new_password)) {
            if (strlen($new_password) >= 8) {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                // Prepare and execute the update query including the password
                $stmt = $conn->prepare("UPDATE userinfo SET name = ?, phone = ?, dob = ?, password = ? WHERE email = ?");
                $stmt->bind_param("sssss", $name, $phone, $dob, $hashed_password, $email);
            } else {
                // Password is too short, show an error message
                echo "<script>alert('Password must be at least 8 characters long.'); window.history.back();</script>";
                exit;
            }
        } else {
            // Prepare and execute the update query without changing the password
            $stmt = $conn->prepare("UPDATE userinfo SET name = ?, phone = ?, dob = ? WHERE email = ?");
            $stmt->bind_param("ssss", $name, $phone, $dob, $email);
        }
    
        if ($stmt->execute()) {
            echo "<script>alert('Profile updated successfully'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Error updating profile');</script>";
        }
    }

?>
</body>
</html>