<?php
$pet_details = []; // Initialize the variable as an empty array
include("fetchPetInventory.php");
include("searchPetInventory.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>MeoWoof</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Website</title>
  <link rel="stylesheet" href="assets/css/admin-inventory.css" />


  <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: lavender;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 999; /* Ensure the form stays on top */
    }
    
    /* Add styles to the form container */
    .form-container {
      max-width: 500px;
      padding: 10px;
      background-color: lavender;
    }
    
    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 10px;
      margin: 5px 0 22px 0;
      border: none;
      background: white;
    }
    
    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }
    
    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: rgb(149, 191, 255);
      color: white;
      padding: 12px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:5px;
      opacity: 0.8;
    }
    
    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: rgb(132, 127, 133);
    }
    
    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }
    </style>

</head>

<body>
  <div class="top-navbar">
    <button class="toggle-slider" onclick="toggleSidebar()">☰</button>
    <div class="admin-info" onclick="toggleLogoutBox()">
      <img src="assets/images/admin_profile.jpg" class="admin-icon" alt="Admin Icon">
      <span class="admin-name">Kylian Mbappe</span>
    </div>
  </div>

  <div class="logout-box" id="logoutBox">
    <button class="logout-button" onclick="logout()">Log Out</button>
  </div>

    <div class="sidebar">
      <div class="sidebar-header">
        <img src="assets/images/Logo.png" class="sidebar-logo" alt="Logo">
        <span class="sidebar-title">MeoWoof Admin</span>
      </div>
    <a href="Admin-Dashboard.html" class="sidebar-link"><img src="assets/images/dashboard_icon.png" class="sidebar-icon" alt="Dashboard Icon">
      <span class="sidebar-link-text">Dashboard</span></a>
    <a href="#" class="sidebar-link current"><img src="assets/images/inventory_icon.png" class="sidebar-icon" alt="Pets Inventory Icon">
      <span class="sidebar-link-text">Pets Inventory</span></a>
    <a href="Admin-MissingBoard.html" class="sidebar-link"><img src="assets/images/MissingBoard_icon.png" class="sidebar-icon" alt="Missing Board Icon">
      <span class="sidebar-link-text">Missing Board</span></a>
    <a href="Admin-CustomerQ.html" class="sidebar-link"><img src="assets/images/MissingQ_icon.png" class="sidebar-icon" alt="Missing In Q Icon">
      <span class="sidebar-link-text">Missing In Q</span></a>
  </div>

    <div class="content">
    <form action="" method="POST">
    <div class="search-bar">
        <input type="text" name="search" id="searchInput" placeholder="Enter pet's name, age, breed, gender, or adoption fee">
        <button type="submit" name="submitSearch" class="search-button"><img src="assets/images/search_icon.png" alt="Search Icon"></button>
    </div>
</form>

      <div class="action-buttons">
        <button class="add-button" onclick="openPetInventoryForm()">Add</button>
        
      </div>
      

<div class="table-admin">

  <table class ="table">
     <tr>
      <th>Picture</th>
      <th>Pet Name</th>
      <th>Type</th>
      <th>Age</th>
      <th>Gender</th>
      <th>Breed/Description</th>
      <th>Adoption Fee</th>
      <th>Edit</th>
      <th>Delete</th>
     </tr>

     <?php
            foreach ($fetchData as $data) {
                echo '<tr>';
                echo '<td><img src="' . $data['pet_picture'] . '" alt="Pet Picture"></td>';
                echo '<td>' . $data['pet_name'] . '</td>';
                echo '<td>' . $data['pet_breed'] . '</td>';
                echo '<td>' . $data['pet_age'] . '</td>';
                echo '<td>' . $data['pet_gender'] . '</td>';
                echo '<td>' . $data['pet_personality'] . '</td>';
                echo '<td>' . $data['pet_adoptionfee'] . '</td>';
               
                echo '<td><button class="edit-button" onclick="editPet(' . $data['pet_id'] . ')">Edit</button></td>';
                echo '<td><button class="edit-button" onclick="deletePet(' . $data['pet_id'] . ')">Delete</button></td>';
                echo '</tr>';
      }
      ?>
  </table>
</div>

<h3><u>Search Result</u></h3><br/>

<div class="table-admin">

  <table class ="table">
      <tr>
        <th>Picture</th>
        <th>Pet Name</th>
        <th>Type</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Breed/Description</th>
        <th>Adoption Fee</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
                <?php
                    foreach($pet_details as $key=>$value)
                    {
                        ?>
                    <tr>
                    <td><img src="<?php echo $value['pet_picture']; ?>" alt="Pet Picture"></td>
                    <td><?php echo $value['pet_name']; ?></td>
                    <td><?php echo $value['pet_breed']; ?></td>
                    <td><?php echo $value['pet_age']; ?></td>
                    <td><?php echo $value['pet_gender']; ?></td>
                    <td><?php echo $value['pet_personality']; ?></td>
                    <td><?php echo $value['pet_adoptionfee']; ?></td>
                    <td><button class="edit-button" onclick="editPet(<?php echo $value['pet_id']; ?>)">Edit</button></td>
                    <td><button class="edit-button" onclick="deletePet(<?php echo $value['pet_id']; ?>)">Delete</button></td>
                    </tr>
                         
                        <?php
                    }
                ?>
             
         
  </table>
  <!-- Check if no data is found -->
  <?php if (!$pet_details): ?>
        <p>No data found</p>
      <?php endif; ?>
</div>


<div class="bottom-buttons">
  <a href="#" class="navigation-button1">1</a>
  <a href="#" class="navigation-button2">2</a>
  <a href="#" class="navigation-button">></a>
</div>
</div>


<div class="form-popup" id="addPetInventoryForm">
  <form action="adminpetsinventory.php" class="form-container" method="POST" enctype="multipart/form-data">
    <h2>Add New Pets to Inventory</h2>

    <label>Pet Name</label>
    <input type="text" name="pet_name" required>
    <label>Pet Age</label>
    <input type="text" name="pet_age" required>
    <label>Type</label>
    <input type="text" name="pet_breed" required>
    <label>Gender</label>
    <input type="text" name="pet_gender" required>
    <label>Pet Breed/Description</label>
    <input type="text" name="pet_personality" required>
    <label>Adoption Fee</label>
    <input type="text" name="pet_adoptionfee" required>
    <label for="pet_picture">Pet Picture</label>
  <input type="file" name="pet_picture" id="pet_picture" accept="image/*" required>

    <button type="submit" value="Submit" class="btn">Save</button>
    <button type="button" class="btn cancel" onclick="closePetInventoryForm()">Close</button>
  </form>
</div>

 <!-- Add a hidden edit form outside the main content -->
<div class="form-popup" id="editPetForm" style="display:none;">
    <form action="updatePet.php" class="form-container" method="POST" enctype="multipart/form-data">
    <h2>Edit Pet</h2>
        <!-- Input fields for editing pet details -->

        <input type="hidden" id="petIdInput" name="pet_id" value="<!-- The value should be fetched dynamically based on the pet being edited -->">
        
        <label for="petNameInput">Pet Name</label>
        <input type="text" id="petNameInput" name="pet_name" required>
        
        <label for="petAgeInput">Pet Age</label>
        <input type="text" id="petAgeInput" name="pet_age" required>

        <label for="petBreedInput">Pet Type</label>
        <input type="text" id="petBreedInput" name="pet_breed" required>

        <label for="petGenderInput">Pet Gender</label>
        <input type="text" id="petGenderInput" name="pet_gender" required>

        <label for="petPersonalityInput">Pet Breed/Description</label>
        <input type="text" id="petPersonalityInput" name="pet_personality" required>

        <label for="petAdoptionFeeInput">Adoption Fee</label>
        <input type="text" id="petAdoptionFeeInput" name="pet_adoptionfee" required>

        <label for="petPictureInput">Pet Picture</label>
<input type="file" id="petPictureInput" name="pet_picture" accept="image/*">

        <button type="submit" value="Submit" class="btn">Save</button>
        <button type="button" class="btn cancel" onclick="closeEditPetForm()">Close</button>
    </form>
</div>




<script src="assets/js/admin-script.js"></script>


</body>
</html>

