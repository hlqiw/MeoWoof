<?php
session_start();

// Database connection details
include("userdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];

    // Validate input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM user_profile WHERE username='$username' AND user_password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful, set session variables
        $_SESSION['login_user'] = $username;
        
        // Redirect to a logged-in page
        header("location:Customer/uAdoptPage.php");
    } else {
        $error = "Invalid username or password";
    }
}
$conn->close();
?>