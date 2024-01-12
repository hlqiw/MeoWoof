<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Retrieve form data (you can add more validation/sanitization)
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $phoneNo = $_POST["phoneNo"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    
    // Database connection details
    include("db.php");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user ID from session
    $user_id = $_SESSION['login_user'];

    // Prepare SQL statement to fetch user data
    $sql_fetch = "SELECT * FROM user_profile WHERE user_id = $user_id";
    $result = $conn->query($sql_fetch);

    if ($result->num_rows > 0) {
        // Assuming there's only one row for a user; you might want to handle multiple rows differently
        $row = $result->fetch_assoc();
        
        // Assign retrieved values to variables
        $retrievedFirstName = $row['firstname'];
        $retrievedLastName = $row['lastname'];
        $retrievedUsername = $row['username'];
        $retrievedPhoneNo = $row['phone_no'];
        $retrievedEmail = $row['email_address'];
        $retrievedLocation = $row['location'];

        // Close the database connection
        $conn->close();
    }
}
?>