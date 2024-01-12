<?php
include("userdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form data
    $petId = isset($_POST['pet_id']) ? $_POST['pet_id'] : null;
    $petname = isset($_POST['pet_name']) ? $_POST['pet_name'] : null;
    $petage = isset($_POST['pet_age']) ? $_POST['pet_age'] : null;
    $petbreed = isset($_POST['pet_breed']) ? $_POST['pet_breed'] : null;
    $petgender = isset($_POST['pet_gender']) ? $_POST['pet_gender'] : null;
    $petpersonality = isset($_POST['pet_personality']) ? $_POST['pet_personality'] : null;
    $petadoptionfee = isset($_POST['pet_adoptionfee']) ? $_POST['pet_adoptionfee'] : null;

    // Check if all necessary fields are present
    if ($petId && $petname && $petage && $petbreed && $petgender && $petpersonality && $petadoptionfee) {
        // Handle image upload if a new file has been uploaded
        if ($_FILES['pet_picture']['name'] != '') {
            $targetDirectory = "uploads/"; // Directory where images will be stored
            $targetFile = $targetDirectory . basename($_FILES["pet_picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check file size, type, etc., similar to your existing code for adding a new pet's picture
            // ... (same logic as the code you used for adding a new pet's picture)

            // Move uploaded file if everything is okay
            if ($uploadOk == 1 && move_uploaded_file($_FILES["pet_picture"]["tmp_name"], $targetFile)) {
                // Update the pet's information in the database including the new picture path
                $petpicture = $targetFile; // Save the file path or use binary data as per your database schema

                $query = "UPDATE pet_inventory SET pet_name=?, pet_age=?, pet_breed=?, pet_gender=?, pet_personality=?, pet_adoptionfee=?, pet_picture=? WHERE pet_id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssssi", $petname, $petage, $petbreed, $petgender, $petpersonality, $petadoptionfee, $petpicture, $petId);

                if ($stmt->execute()) {
                    // Redirect back to the inventory page or display a success message
                    echo "Update Successful! .";
                    header("Location: Admin-Petsinventory.php");
                    exit();
                } else {
                    echo "Update failed: " . $conn->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.'); window.location='Admin-PetsInventory.php';</script>";
            }
        } else {
            // If no new picture is uploaded, update other details without updating the picture path
            $query = "UPDATE pet_inventory SET pet_name=?, pet_age=?, pet_breed=?, pet_gender=?, pet_personality=?, pet_adoptionfee=? WHERE pet_id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssi", $petname, $petage, $petbreed, $petgender, $petpersonality, $petadoptionfee, $petId);

            if ($stmt->execute()) {
                // Redirect back to the inventory page or display a success message
                echo "Update Successful! .";
                header("Location: Admin-Petsinventory.php");
                exit();
            } else {
                echo "Update failed: " . $conn->error;
            }
        }
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request.";
}
?>