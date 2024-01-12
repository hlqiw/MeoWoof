<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['login_user'])) {
    // If not logged in, redirect to the login page
    header("Location: Login.html");
    exit(); // Stop further execution
}
?>

<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="assets/css/uStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>

            /* Style for the form container */
    .missing-report-form {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 60px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 999; /* Ensure the form stays on top */
    }

    /* Style for the form inputs and buttons */
    .missing-report-form input,
    .missing-report-form textarea {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .missing-report-form button {
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 10px;
    }

    /* Style for the upload button */
    .upload-btn {
      display: inline-block;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #80ACC9;
      color: #fff;
    }
 
    /* Style for the details popup */
    .image-details-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .image-details-popup img {
            width: 100%;
            border-radius: 5px;
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
            </div>
        </nav>
        <!--DONE Navigation Bar Part-->

        <div class="MissingBU">
            <div class="Board">
                <a>Missing Board</a>
                <div class="rowB">
                    <div class="column" onclick="showImageDetails('Sofia', 'Area Unimas')">
                        <div class="imageMB">
                            <img src="assets/image/TestImg.png" alt="Img" >
                        </div>
                        <div class="descMB">
                            <h3>Sofia</h3>
                            <h6>Last Seen: Area Unimas </h6>
                        </div>
                    </div>
                    <div class="column" onclick="showImageDetails('Sofia', 'Area Unimas')">
                        <div class="imageMB">
                            <img src="assets/image/TestImg.png" alt="Img" >
                        </div>
                        <div class="descMB">
                            <h3>Sofia</h3>
                            <h6>Last Seen: Area Unimas </h6>
                        </div>
                    </div>
                    <div class="column" onclick="showImageDetails('Sofia', 'Area Unimas')">
                        <div class="imageMB">
                            <img src="assets/image/TestImg.png" alt="Img" >
                        </div>
                        <div class="descMB">
                            <h3>Sofia</h3>
                            <h6>Last Seen: Area Unimas </h6>
                        </div>
                    </div>        
                    <div class="column" onclick="showImageDetails('Sofia', 'Area Unimas')">
                        <div class="imageMB">
                            <img src="assets/image/TestImg.png" alt="Img" >
                        </div>
                        <div class="descMB">
                            <h3>Sofia</h3>
                            <h6>Last Seen: Area Unimas </h6>
                        </div>
                    </div>
                     

                </div> 
               
            <!-- Add Report button -->
                <div class="add-report-button" onclick="showReportForm()">
                    <!--<span class="plus-sign">+</span>-->
                    <span class="report-pet-button" >+</span>
                </div>

  <!-- Missing Report Form -->
<div class="missing-report-form" id="missingReportForm">
    <h2>Report Missing Pet</h2>
    <form action="save_missing_report.php" method="post" enctype="multipart/form-data">
        <input type="text" name="mb_petname" placeholder="Pet's Name" required><br>
        <input type="text" name="mb_collar" placeholder="Pet's Collar Tag (if any)"><br>
        <textarea name="mb_descrption" placeholder="Pet Description"></textarea><br>
        <input type="text" name="mb_lastseen" placeholder="Last Seen" required><br>
        <input type="text" name="mb_location" placeholder="Location" required><br>
        <input type="text" name="mb_famcontactname" placeholder="Family Contact Name" required><br>
        <input type="tel" name="mb_famcontactno" placeholder="Family Contact Number" required><br>
        <!-- Add this line inside your form -->
        <input type="file" name="mb_petpic" accept="image/*" required><br>

       <!-- <label for="petImage" class="upload-btn">Upload Pet's Picture</label><br>-->

        <button type="submit" value="Submit">Save</button>
        <button type="button" onclick="cancelReport()">Cancel</button>
      </form>      
  </div>  
            </div>
        </div>

    <!-- Image Details Popup -->
    <div class="image-details-popup" id="imageDetailsPopup">
        <h2 id="petName"></h2>
        <p id="lastSeen"></p>
        <!-- Add more details if needed -->

        <button onclick="closeImageDetails()">Close</button>
    </div>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            //function popup for report missing pet
            function showReportForm() {
            document.getElementById("missingReportForm").style.display = "block";
            }

            function cancelReport() {
            document.getElementById("missingReportForm").style.display = "none";
            }

                

              // New function to show image details popup
        function showImageDetails(name, lastSeen) {
            const detailsPopup = document.getElementById('imageDetailsPopup');
            const petName = document.getElementById('petName');
            const lastSeenElement = document.getElementById('lastSeen');

            petName.textContent = name;
            lastSeenElement.textContent = 'Last Seen: ' + lastSeen;

            // Fetch image details from the report form
            const petImageInput = document.getElementById('petImage');
            if (petImageInput.files.length > 0) {
                const file = petImageInput.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    petImageDetails.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }

            detailsPopup.style.display = 'block';
        }

        // New function to close image details popup
        function closeImageDetails() {
            const detailsPopup = document.getElementById('imageDetailsPopup');
            detailsPopup.style.display = 'none';
        }
        
        </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const reportForm = document.getElementById('missingPetForm');

        reportForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Ask for confirmation
            const userConfirmed = window.confirm('Are you sure you want to submit this report?');

            if (userConfirmed) {
                // User confirmed, proceed to submit the form
                submitForm();
            } else {
                // User canceled, do nothing or provide feedback
            }
        });

        function submitForm() {
            // Use Fetch API to send form data to the server
            fetch('save_missing_report.php', {
                method: 'POST',
                body: new FormData(reportForm),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Log the response for debugging

                if (data.status === 'success') {
                    // Display a simple success message
                    alert('Your report has been submitted successfully.');
                    // Optionally, you can reset the form
                    reportForm.reset();
                    // Hide the report form
                    const reportFormContainer = document.getElementById('missingReportForm');
                    reportFormContainer.style.display = 'none';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                alert('Error submitting the form. Please try again.');
            });
        }
    });
</script>

  
    </body>
</html>