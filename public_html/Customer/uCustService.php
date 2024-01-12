<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['login_user'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Service</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="assets/css/uStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body{
                background-image: url(https://images.unsplash.com/photo-1598111215772-dab6abdc2ae0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);
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
        
        <div class="row">
            <div class="Side">
                <!-- left FAQ-->
                <div class="Left">
                    <h1>FAQ</h1>
                    <h4>The Frequent Asked Question that will help you answer your technical questions about this website</h4>
                    <!-- <button class="CustButton">List of FAQ</button> -->
                    <button class="btn btn-primary CustButton" data-bs-toggle="modal" data-bs-target="#faqModal">
                        List of FAQ
                    </button>

                 <!-- Modal -->
<div class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="faqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-lg for a larger modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="faqModalLabel">List of FAQ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your FAQ content here -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="faqDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Select a Question
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="faqDropdown">
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Make sure you are using the correct username and password. If you still face this issue, click on the “Forgot Password” button on the login page to reset your password. Make sure to use your correct email to get the instructions to reset your password.', 'Q: I’m having problems logging into my account. What should I do?')">Q: I’m having problems logging into my account. What should I do?</a></li>
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Make sure you are logged into your account before adding any pet into the cart. If the problem continues, please check if the pet you tried to adopt is still available. If you are still having the problem, please contact to our support team at the “Chat Support”.', 'Q: Why can’t I add the pet I want to adopt into the cart?')">Q: Why can’t I add the pet I want to adopt into the cart?</a></li>
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Try refreshing the page and also make sure you are connected to internet connection. It could be a connectivity issue so make sure your internet connection is stable and not weak.', 'Q: The website is not displaying pet images, what can I do to fix this?')">Q: The website is not displaying pet images, what can I do to fix this?</a></li>
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Please report any bugs you found on the website to our support team at the “Chat Support”. Provide details on the bugs like screenshots if possible so that we can fix the website as soon as possible.', 'Q: I found a bug on the website, where can I report it?')">Q: I found a bug on the website, where can I report it?</a></li>
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Unfortunately, our website is currently only supporting English language.', 'Q: Is there a way to change the website’s language to Chinese?')">Q: Is there a way to change the website’s language to Chinese?</a></li>
                        <li><a class="dropdown-item" href="#" onclick="displayAnswer('Contact with our support team at the “Chat Support” as soon as possible so that we can help you to cancel the order.', 'Q: I accidentally ordered the wrong pet, is it still possible to cancel my order?')">Q: I accidentally ordered the wrong pet, is it still possible to cancel my order?</a></li>
                        <!-- Add more FAQ items as needed -->
                    </ul>
                </div>

                <div class="mt-2">
                    <!-- Display the selected answer here -->
                    <p id="selectedAnswer" style="white-space: pre-line;">Select a question to view the answer.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function displayAnswer(answer, question) {
        document.getElementById('selectedAnswer').innerText = 'Answer: ' + answer;
        document.getElementById('faqDropdown').innerText = question;
    }
</script>

                </div>
            </div>

            <div class="Side">
    <!-- right Chat Support -->
    <div class="Right">
        <h1>Chat Support</h1>
        <h4>Real Time Chat with our Team Support down the Chat Now button or call our Customer Service number below</h4>
        <a class="btn btn-primary CustButton" href="https://wa.me/60196668481?text=Meowoof!%20I%20need%20help!" target="_blank">Chat Now</a>
    </div>
</div>

        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
    </body>
    
    <footer>
        <div class="row">
            <div class="AdsCustServ" >
                <h4 style="font-weight: bold;">Help Us Build Our Community</h4>
                <h5 style="font-weight: bold; font-style: italic;">Follow us in </h5>
                <h6>
                    <a href="https://www.facebook.com/" style="color: rgb(0, 0, 0);">Facebook</a>
                    <a href="https://www.instagram.com/" style="color: rgb(0, 0, 0);" >Instagram</a>
                </h6>
            </div>
        </div>
    </footer>
</html>