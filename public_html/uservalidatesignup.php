<?php

session_start();

include("userdb.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $firstname = $_POST['userFirstName'];
    $lastname = $_POST['userLastName'];
    $username = $_POST['userName'];
    $phonenumber = $_POST['userPhoneNo'];
    $address = $_POST['userAddress'];
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    // Use a regular expression to check the fullname is alphabet
if (!preg_match('/^(\b[A-Z][a-z]*\s*)+$/', $firstname)) {
  //echo 'First Name is not valid. Only alphabet characters are allowed.';
  echo"<script type='text/javascript'>alert('First Name is not valid. Only alphabet characters are allowed.'); window.location='usersignup.php';</script>";
  exit;
}

// Use a regular expression to check the fullname is alphabet
if (!preg_match('/^(\b[A-Z][a-z]*\s*)+$/', $lastname)) {
    //echo 'Last Name is not valid. Only alphabet characters are allowed.';
    //exit;
    echo"<script type='text/javascript'>alert('Last Name is not valid. Only alphabet characters are allowed.'); window.location='usersignup.php';</script>";
    exit;
    
  }
if (!preg_match('/^[0-9]{10}+$/', $phonenumber)) {
    //echo 'Phone number is not valid. Only digits are allowed.';
    //exit;
    echo"<script type='text/javascript'>alert('Phone number is not valid. Only digits are allowed.'); window.location='usersignup.php';</script>";
    exit;
}

// Use the filter_var function to check the email is in a valid format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //echo 'Email is not valid.';
  //exit;
  echo"<script type='text/javascript'>alert('Email is not valid.'); window.location='usersignup.php';</script>";
  exit;
}

// one uppercase, one numeric, one special characters, number and no space and at least 6 digits
if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
  //echo 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.';
  //exit;
  echo"<script type='text/javascript'>alert('Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.'); window.location='usersignup.php';</script>";
  exit;
 }

if(!empty($firstname) && !empty($lastname) && !empty($phonenumber) && !empty($address) && !empty($email) && !is_numeric($password))
{
    $query = "INSERT INTO user_profile (first_name, last_name, username, phone_no, email_address, location, user_password) values ('$firstname', '$lastname', '$username', '$phonenumber', '$address', '$email', '$password')";

    // Insert user profile data
    mysqli_query($conn, $query);

    // Get the last inserted user ID
    $lastInsertedId = mysqli_insert_id($conn);

    // Insert user login information
    $loginQuery = "INSERT INTO login_table (user_id, username, user_password) values ('$lastInsertedId', '$username', '$password')";
    mysqli_query($conn, $loginQuery);

    echo"<script type='text/javascript'>alert('Successfully Registered'); window.location='usersignup.php';</script>";
}
else 
{
    echo"<script type='text/javascript'>alert('Please enter valid information. '); window.location='usersignup.php';</script>";
}

}