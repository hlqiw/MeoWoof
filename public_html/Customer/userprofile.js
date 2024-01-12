document.getElementById('usereditform').addEventListener('submit', function(event) {
  event.preventDefault();

  // Fetch input values
  const firstname = document.getElementById('firstname').value.trim();
  const lastname = document.getElementById('lastname').value.trim();
  const username = document.getElementById('username').value.trim();
  const phoneNo = document.getElementById('phoneNo').value.trim();
  const email = document.getElementById('email').value.trim();
  const location = document.getElementById('location').value.trim();

  // Perform validation (You can add more specific validations as needed)
  if (firstname === '' || lastname === '' || username === '' || phoneNo === '' || email === '' || location === '') {
    alert('Please fill in all fields.');
  }else {
    // For demo purposes, you might want to process the form data here
    console.log('firstname', firstname);
    console.log('lastname', lastname);
    console.log('username', username);
    console.log('phoneNo', phoneNo);
    console.log('email:', email);
    console.log('location', location);
    alert('Update changes successful!');
    document.getElementById('usereditform').reset(); // Reset the form after submission
  }
});

document.getElementById('canceleditButton').addEventListener('click', function() 
{
  alert('Editing canceled');
  document.getElementById('usereditform').reset();
});


//form for edit password
function openForm() {
  document.getElementById("myForm").style.display = "block";
  document.getElementById('currentPasswordForm').value = ''; // Clear current password field
  document.getElementById('newPasswordForm').value = ''; // Clear new password field
  document.getElementById('confirmPasswordForm').value = ''; // Clear confirm password field
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById('currentPasswordForm').value = ''; // Clear current password field
  document.getElementById('newPasswordForm').value = ''; // Clear new password field
  document.getElementById('confirmPasswordForm').value = ''; // Clear confirm password field
}


function handleSubmit(event) {
  event.preventDefault();

  //Get the input values from the form
  const currentPassword = document.getElementById('currentPasswordForm').value.trim();
  const newPassword = document.getElementById('newPasswordForm').value.trim();
  const confirmPassword = document.getElementById('confirmPasswordForm').value.trim();
  
  console.log('currentPassword', currentPassword);
  console.log('newPassword', newPassword);
  console.log('confirmPassword', confirmPassword);
  
  //Perform validation
  if (currentPassword === '' || newPassword === '' || confirmPassword === '') 
  {
    alert('Please fill in all fields. ');
  }
  else if (newPassword != confirmPassword)
  {
    alert('New password and confirm password must match. ');
    document.getElementById('currentPasswordForm').value = ''; // Clear current password field
    document.getElementById('newPasswordForm').value = ''; // Clear new password field
    document.getElementById('confirmPasswordForm').value = ''; // Clear confirm password field
  }
  else if (newPassword === currentPassword)
  {
    alert('New password and current password must be different. ');
    document.getElementById('currentPasswordForm').value = ''; // Clear current password field
    document.getElementById('newPasswordForm').value = ''; // Clear new password field
    document.getElementById('confirmPasswordForm').value = ''; // Clear confirm password field
  }
  else
  {
    alert('Password changed successfully!');
    closeForm();
    document.getElementById('myForm').reset();
  }
}

document.getElementById('btnCancel').addEventListener('click', function() 
{
  alert('Editing canceled');
  document.getElementById('myForm').reset();
});

function toggleDropdown() {
  var dropdownContent = document.querySelector('.dropdown-content');
  dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
}

function confirmLogout() {
  // Display a confirmation dialog
  var confirmResult = confirm("Are you sure you want to log out?");

  // If the user confirms, proceed with logout
  if (confirmResult) {
      logout();
  }
}

function logout() {
  // Add your logout logic here
  // For example, clear user session, redirect to login page, etc.
  alert('Logout successful!'); // Replace this with your actual logout logic
  window.location.href = "../LogIn.html";
}