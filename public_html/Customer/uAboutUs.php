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
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="assets/css/uStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            
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
                    <a class="nav-link" href="uAdoptPage.html">Pet Adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uMissingB.html">Missing Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uCustService.html">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uAboutUs.html">About Us</a>
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
                
                </ul>
            </div>
            </div>
        </nav>
        <!--DONE Navigation Bar Part-->
        <!--
            MeoWoof + Domus Diversitas
            Vision + Mission
        -->
        <div class="AboutUsFront">
            <h1 style="font-weight: bold; font-style: italic; color: rgb(191, 197, 198); padding: 20.5%;">About Us</h1>
        </div>
        <div class="company">
            <div class="DDLogo">
                <img src="assets/image/Domus Diversitas.png" alt="Logos" style="width:80%" margin="0%">
            </div>
            <div class="Desc">
                <h2 style="font-weight: bold; font-style: italic;">Our Story</h2>
                <h5 style="text-align: justify;padding: 4px;">Domus Diversitas Sdn. Bhd. established in 2023 by Miss Jahizah Iffah Binti Yaacob, shelters stray animals from harm. Focused on raising awareness, the organization collaborates with veterinarians, conducts adoption programs, and engages in community outreach. With a commitment to transparency, legal compliance, and sustainability, Domus Diversitas aims to create a compassionate community for stray animals.</h5>
            </div>
        </div>

        <div class="VnMContainer">
            <h2 style="font-weight: bold; font-style: italic;">Vision</h2>
            <h5 style="text-align: justify;padding: 5px;">To save stray animals from harm or abuse and also spread awareness about stray pets to everyone so that there will be a loving bond between humans and pets.</h5>            
        </div>
        <div class="VnMContainer">
            <h2 style="font-weight: bold; font-style: italic;">Mission</h2>
            <h5 style="text-align: justify;padding: 5px;">To develop a platform that simplifies the adoption procedure for potential pet owners as well as the animal shelter where the stray pets can be loved and protected.</h5>

        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>
    <footer>
        <div class="ufooter">
            <a>Powered by Domus Diversitas</a>
        </div>
    </footer>
</html>