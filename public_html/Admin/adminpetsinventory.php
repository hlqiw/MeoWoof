<?php 
session_start();

$dbhost = "localhost";
$dbuser = "id21727828_meowoof2023";
$dbpass = "Sns@1234";
$dbname = "id21727828_meowoof";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("Failed to connect!");
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $petname = $_POST['pet_name'];
    $petage = $_POST['pet_age'];
    $petbreed = $_POST['pet_breed'];
    $petgender = $_POST['pet_gender'];
    $petpersonality = $_POST['pet_personality'];
    $petadoptionfee = $_POST['pet_adoptionfee'];

    // Use a regular expression to check the name is alphabet
if (!preg_match('/^(\b[A-Z][a-z]*\s*)+$/', $petname)) {
  //echo 'Pet Name is not valid. Only alphabet characters are allowed.';
  echo"<script type='text/javascript'>alert('Pet Name is not valid. Only alphabet characters are allowed.'); window.location='Admin-PetsInventory.php';</script>";
  exit;
}

// Handle image upload
$targetDirectory = "uploads/"; // Directory where images will be stored
$targetFile = $targetDirectory . basename($_FILES["pet_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["pet_picture"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    echo "<script type='text/javascript'>alert('File is not an image.'); window.location='Admin-PetsInventory.php';</script>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["pet_picture"]["size"] > 500000) { // Adjust size limit as needed
    echo "<script type='text/javascript'>alert('Sorry, your file is too large.'); window.location='Admin-PetsInventory.php';</script>";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.'); window.location='Admin-PetsInventory.php';</script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.'); window.location='Admin-PetsInventory.php';</script>";
} else {
    if (move_uploaded_file($_FILES["pet_picture"]["tmp_name"], $targetFile)) {
        // File uploaded successfully, now save the file path to the database
        $petpicture = $targetFile; // Save the file path or use binary data as per your database schema

        // Insert pet details including the picture path into the database
        $query = "INSERT INTO pet_inventory (pet_name, pet_age, pet_breed, pet_gender, pet_personality, pet_adoptionfee, pet_picture) 
                    VALUES ('$petname', '$petage', '$petbreed', '$petgender', '$petpersonality', '$petadoptionfee', '$petpicture')";

        mysqli_query($conn, $query);

        echo "<script type='text/javascript'>alert('Successfully Registered'); window.location='Admin-PetsInventory.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.'); window.location='Admin-PetsInventory.php';</script>";
    }
}
} else {
echo "<script type='text/javascript'>alert('Please enter valid information.'); window.location='Admin-PetsInventory.php';</script>";
}

?>