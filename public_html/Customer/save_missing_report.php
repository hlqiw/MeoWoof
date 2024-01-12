<?php 
session_start();

include("userdb.php");

// Fetch data from the database
$username = $_SESSION['login_user'];
$stmt = $conn->prepare("SELECT user_id, first_name, last_name, username, phone_no, email_address, location FROM user_profile WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$row = $result->fetch_assoc();
$userid = $row['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $mbpetname = $_POST['mb_petname'];
    $mbpetcollar = $_POST['mb_collar'];
    $mbpetdescription = $_POST['mb_descrption'];
    $mbpetlastseen = $_POST['mb_lastseen'];
    $mbpetlocation = $_POST['mb_location'];
    $mbpetfamcontactname = $_POST['mb_famcontactname'];
    $mbpetfamcontactno = $_POST['mb_famcontactno'];


// Handle image upload
$targetDirectory = "uploads/"; // Directory where images will be stored
$targetFile = $targetDirectory . basename($_FILES["mb_petpic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["mb_petpic"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo "<script type='text/javascript'>alert('File is not an image.'); window.location='uMissingB.html';</script>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["mb_petpic"]["size"] > 500000) { // Adjust size limit as needed
    echo "<script type='text/javascript'>alert('Sorry, your file is too large.'); window.location='uMissingB.html';</script>";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location='uMissingB.html';</script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.'); window.location='uMissingB.html';</script>";
} else {
    if (move_uploaded_file($_FILES["mb_petpic"]["tmp_name"], $targetFile)) {
        // File uploaded successfully, now save the file path to the database
        $mbpetpic = $targetFile; // Save the file path or use binary data as per your database schema

        // Insert pet details including the picture path into the database
        $query = "INSERT INTO missing_board (user_id, mb_petname, mb_collar, mb_descrption, mb_lastseen, mb_location, mb_famcontactname, mb_famcontactno, mb_petpic, mb_status) 
                    VALUES ('$userid', '$mbpetname', '$mbpetcollar', '$mbpetdescription', '$mbpetlastseen', '$mbpetlocation', '$mbpetfamcontactname', '$mbpetfamcontactno', '$mbpetpic', 'Waiting...')";

        mysqli_query($conn, $query);

        echo "<script type='text/javascript'>alert('Missing report submit successfully! Application in progress.'); window.location='uMissingB.html';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.'); window.location='uMissingB.html';</script>";
    }
}
} else {
echo "<script type='text/javascript'>alert('Please enter valid information.'); window.location='uMissingB.html';</script>";
}
$stmt->close();


?>




