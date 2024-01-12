<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include ("db.php");
// Database connection
if(isset($_SESSION['login_user'])) {
    

    // Fetch data from the database
    $username = $_SESSION['login_user'];
    $stmt = $conn->prepare("SELECT user_id, first_name, last_name, username, phone_no, email_address, location FROM user_profile WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found";
    }

    $conn->close();
} else {
    // Redirect to login page or handle unauthorized access
    //header("Location: login.php"); // Redirect to your login page
    exit();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="assets/css/uStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <style>
            body{
                background-image: url(https://images.unsplash.com/photo-1578500523703-2201d5f03bcb?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 110%;
                background-color: rgba(255, 255, 255, 0.263); /* Adjust the last value (0.5) to change the opacity */
                width: auto;
                margin: auto;
            }    
        </style>
    </head>

    <body>

        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-light pt-1 pb-1 bg-info">
            <div class="container-xxl">
            <!-- navbar brand / title -->
            <a class="navbar-brand" href="uAdoptPage.html">
                <span class="text-secondary fw-bold text-dark" >
                MeoWoof
                </span>
                
                <span>
                    <img src="assets/image/MeoWoof.png" alt="Logos" style="width:10%" margin="0%">
                </span>

            </a>
            <!-- toggle button for mobile nav -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="uAdoptPage.php">Pet Adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uMissingB.php">Missing Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uCustService.php">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uAboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Profile <!--Ni nnti tukar username user-->
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: rgba(13, 202, 240, 0.854);">
                            <li><a class="dropdown-item" href="EditProfile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#">Missing Pet Application</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                    </div>
                </li>
                
                </ul>
            </div>
            </div>
        </nav>
        <!--DONE Navigation Bar Part-->

        <div class="container rounded bg-white mt-5 mb-4 backdrop-filter: blur(5px);" >
            <div class="row">
                <div class="col-md-4 border-right"> <!--Profile Photo-->
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://i.redd.it/gojo-satoru-drawn-by-me-manga-version-and-full-colouring-v0-h764xwzodu191.png?width=2000&format=png&auto=webp&s=ca13374340711dc8bcd000bffdbab13cc3b72067">
                        <span class="font-weight-bold"></span>
                        <span class="text-black-50"></span>
                        <span class="text-black-50"></span> 
                    </div>
                </div>
                <div class="col-md-7 border-right"> <!--Customer Detail-->
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        
                    <?php
                    // Display user's profile
                    echo "<p>User ID: " . $row["user_id"] . "</p>";
                    echo "<p>Username: " . $row["username"] . "</p>";
                    echo "<p>First Name: " . $row["first_name"] . "</p>";
                    echo "<p>Last Name: " . $row["last_name"] . "</p>";
                    echo "<p>Phone No: " . $row["phone_no"] . "</p>";
                    echo "<p>Email Address: " . $row["email_address"] . "</p>";
                    echo "<p>Location: " . $row["location"] . "</p>";
                    // Display other profile details similarly
                    ?>
                        
                    <!-- Edit button -->
                    <a href="userprofile.html" class="btn btn-primary">Edit</a>    
                        

                </div>
            </div>
        </div>   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- ... (Your existing HTML code) ... -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Fetch user data from the server and set as placeholders in the form
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "usereditprofile.php", // Replace with the actual URL of your PHP script
            dataType: "json",
            success: function (userData) {
                // Set form field placeholders with retrieved data
                $("#firstName").attr("placeholder", userData.firstname);
                $("#lastName").attr("placeholder", userData.lastname);
                $("#username").attr("placeholder", userData.username);
                $("#phoneNumber").attr("placeholder", userData.phoneNo);
                $("#address").attr("placeholder", userData.location);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
</script>
</body>
</html>


    </body>
</html>
