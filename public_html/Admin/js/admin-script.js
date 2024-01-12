function toggleButtons() {
    var additionalButtons = document.querySelector(".additionalButtons");
    additionalButtons.style.display = (additionalButtons.style.display === 'none') ? 'flex' : 'none';
  }
  
  function toggleLogoutBox() {
    var logoutBox = document.getElementById('logoutBox');
    logoutBox.style.display = (logoutBox.style.display === 'block') ? 'none' : 'block';
    var profileBox = document.getElementById('profileBox');
    profileBox.style.display = (profileBox.style.display === 'block') ? 'none' : 'block';
  }

  function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('collapsed');
  }

  function toggleEditTable() {
    var editButtons = document.querySelectorAll(".edit-info");
    var deleteButtons = document.querySelectorAll(".delete-info");
  
    editButtons.forEach(function (button) {
      button.classList.toggle("hidden-row");
    });
  
    // Hide information
    deleteButtons.forEach(function (button) {
      button.classList.add("hidden-row");
    });
  }

  function toggleDeleteInfo() {
    var editButtons = document.querySelectorAll(".edit-info");
    var deleteButtons = document.querySelectorAll(".delete-info");
  
    // Hide information
    editButtons.forEach(function (button) {
      button.classList.add("hidden-row");
    });
  
    deleteButtons.forEach(function (button) {
      button.classList.toggle("hidden-row");
    });
  }

  // script.js

document.addEventListener('DOMContentLoaded', function () {
  // Select the buttons and table rows
  const allButton = document.querySelector('.all-button');
  const reviewButton = document.querySelector('.review-button');
  const approveButton = document.querySelector('.approve-button');
  const rejectButton = document.querySelector('.reject-button');

  const allRows = document.querySelectorAll('.table-data');

  // Event listeners for the buttons
  allButton.addEventListener('click', showAllRows);
  reviewButton.addEventListener('click', showRowsByStatus);
  approveButton.addEventListener('click', showRowsByStatus);
  rejectButton.addEventListener('click', showRowsByStatus);

  // Function to show all rows
  function showAllRows() {
    allRows.forEach(row => {
      row.style.display = 'flex';
    });
  }

  // Function to show rows based on status
  function showRowsByStatus(event) {
    const status = event.target.textContent.toLowerCase();
    allRows.forEach(row => {
      const rowStatus = row.querySelector('.data-5').textContent.toLowerCase();
      if (status === 'all' || rowStatus === status) {
        row.style.display = 'flex';
      } else {
        row.style.display = 'none';
      }
    });
  }
});

// You can use JavaScript to dynamically set the percentage values based on your data
// For simplicity, I've set fixed values for cats and dogs percentages.

// Percentage of cats
const catsPercentage = 30;

// Percentage of dogs
const dogsPercentage = 70;

// Apply the percentages to the pie chart
document.getElementById('piechart').style.setProperty('--cats-percentage', catsPercentage + '%');
document.getElementById('piechart').style.setProperty('--dogs-percentage', dogsPercentage + '%');


//function popup for pets inventory
function openPetInventoryForm() {
  document.getElementById("addPetInventoryForm").style.display = "block";
}

function closePetInventoryForm() {
  document.getElementById("addPetInventoryForm").style.display = "none";
}

//edit pet in pet inventory
// Function to display the edit form with the selected pet's details
function editPet(petId) {
  const editPetForm = document.getElementById('editPetForm');
  editPetForm.style.display = 'block';

  fetch('getPetDetails.php?pet_id=' + petId)
    .then(response => response.json())
    .then(data => {
      document.getElementById('petIdInput').value = petId;
      document.getElementById('petNameInput').value = data.pet_name;
      document.getElementById('petAgeInput').value = data.pet_age;
      document.getElementById('petBreedInput').value = data.pet_breed;
      document.getElementById('petGenderInput').value = data.pet_gender;
      document.getElementById('petPersonalityInput').value = data.pet_personality;
      document.getElementById('petAdoptionFeeInput').value = data.pet_adoptionfee;

      // Update the form's action attribute
    editPetForm.action = 'updatePet.php';
      // Ensure other fields match the JSON keys and form field IDs
    })
    .catch(error => console.error('Error:', error));
}
function closeEditPetForm() {
  // Close the edit form popup
  const editPetForm = document.getElementById('editPetForm');
  editPetForm.style.display = 'none';
}


//After delete pet, fetch the latest data
function fetchPetInventory() {
  // Make a fetch request to get the updated pet inventory data
  fetch('fetchPetInventory.php')
    .then(response => response.json())
    .then(data => {
      // Assuming 'tableBody' is the <tbody> element where your pet inventory data is displayed
      const tableBody = document.querySelector('.table-admin table');
      tableBody.innerHTML = ''; // Clear the existing table content

      // Loop through the retrieved data and rebuild the table rows
      data.forEach(pet => {
        const newRow = document.createElement('tr');
        newRow.setAttribute('data-pet-id', pet.pet_id);
        // Construct the table row content using pet data, similar to how you initially populated the table
        newRow.innerHTML = `
          <td><img src="${pet.pet_picture}" alt="Pet Picture"></td>
          <td>${pet.pet_name}</td>
          <td>${pet.pet_breed}</td>
          <td>${pet.pet_age}</td>
          <td>${pet.pet_gender}</td>
          <td>${pet.pet_personality}</td>
          <td>${pet.pet_adoptionfee}</td>
          <!-- Add other table cells with pet data -->
          <td><button onclick="editPet(${pet.pet_id})">Edit</button></td>
          <td><button onclick="deletePet(${pet.pet_id})">Delete</button></td>
        `;
        tableBody.appendChild(newRow); // Append the new row to the table
      });
    })
    .catch(error => console.error('Error fetching pet inventory:', error));
}

 //function to delete pet from inventory
 function deletePet(petId) {
  if (confirm('Are you sure you want to delete this pet?')) {
      fetch('deletePetInventory.php?pet_id=' + petId, {
              method: 'DELETE'
          })
          .then(response => {
              if (response.ok) {
                  // Remove the row from the table
                  const rowToDelete = document.querySelector(`tr[data-pet-id="${petId}"]`);
                  if (rowToDelete) {
                      rowToDelete.remove();

                      // Fetch the updated pet inventory data after deletion
                      fetchPetInventory(); // Function to fetch and update pet inventory data
                  }
              } else {
                  throw new Error('Failed to delete pet');
              }
          })
          .catch(error => console.error('Error:', error));
  }
}


//function popup for edit admin profile
function openAdminProfileForm() {
  document.getElementById("adminEditProfileForm").style.display = "block";
  
}

function closeAdminProfileForm() {
  document.getElementById("adminEditProfileForm").style.display = "none";
}

// Function to open the modal and display pet details

//function popup for edit admin (CUSTOMER IN Q)
function openCustomerInQForm() {
  document.getElementById("adminEditProfileForm").style.display = "block";
  
}

function closeCustomerInQForm() {
  document.getElementById("adminEditProfileForm").style.display = "none";
}

// Add your JavaScript code here
function showPetDetails(mb_id) {
  fetch('getQDetails.php?mb_id=' + mb_id)
      .then(response => response.json())
      .then(data => {
          var content = "<h2>Pet Details</h2>";
          for (const [key, value] of Object.entries(data)) {
              content += `<p>${key}: ${value}</p>`;
          }
          document.getElementById("petDetailsContent").innerHTML = content;
          document.getElementById("petDetailsModal").style.display = "block";
      })
      .catch(error => console.error('Error fetching pet details:', error));
}

function closeModal() {
  document.getElementById("petDetailsModal").style.display = "none";
}

// Function to open the edit form
function editPetDetails() {
  document.getElementById("editCustomerInQForm").style.display = "block";
}

// Function to close the edit form
function closeEditForm() {
  document.getElementById("editCustomerInQForm").style.display = "none";
}


function editCustomerInQ() {
  // Get the pet details from the modal content
  const petDetailsContent = document.getElementById("petDetailsContent");
  const mb_id = petDetailsContent.querySelector('p:contains("Missing Board ID")').textContent.split(":")[1].trim();
  const petname = petDetailsContent.querySelector('p:contains("Pet Name")').textContent.split(":")[1].trim();
  const collar = petDetailsContent.querySelector('p:contains("Collar")').textContent.split(":")[1].trim();
  const description = petDetailsContent.querySelector('p:contains("Description/Breed")').textContent.split(":")[1].trim();
  const lastseen = petDetailsContent.querySelector('p:contains("Last Seen Date")').textContent.split(":")[1].trim();
  const location = petDetailsContent.querySelector('p:contains("Missing Location")').textContent.split(":")[1].trim();
  const famcontactname = petDetailsContent.querySelector('p:contains("Family Contact Name")').textContent.split(":")[1].trim();
  const famcontactno = petDetailsContent.querySelector('p:contains("Family Contact Number")').textContent.split(":")[1].trim();
  const status = petDetailsContent.querySelector('p:contains("Status")').textContent.split(":")[1].trim();
  const user_id = petDetailsContent.querySelector('p:contains("User ID")').textContent.split(":")[1].trim();

  // Assuming you have an edit form similar to the add form
  // Populate the edit form fields with the fetched pet details
  document.getElementById("editMbIdInput").value = mb_id;
  document.getElementById("editPetNameInput").value = petname;
  document.getElementById("editCollarInput").value = collar;
  document.getElementById("editDescriptionInput").value = description;
  document.getElementById("editLastSeenInput").value = lastseen;
  document.getElementById("editLocationInput").value = location;
  document.getElementById("editFamContactNameInput").value = famcontactname;
  document.getElementById("editFamContactNoInput").value = famcontactno;
  document.getElementById("editStatusInput").value = status;
  document.getElementById("editUserIdInput").value = user_id;

  // Open the edit form
  document.getElementById("editPetDetailsForm").style.display = "block";
}

