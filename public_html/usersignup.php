<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log in and Register</title>
        <link rel="stylesheet" href="user style.css">
    </head>
    <body>
        <div class="usersignup">
            <h1>Sign Up</h1>
            <form action="uservalidatesignup.php" method="POST">
                <label>First Name</label>
                <input type="text" name="userFirstName" required>
                <label>Last Name</label>
                <input type="text" name="userLastName" required>
                <label>Username</label>
                <input type="text" name="userName" required>
                <label>Phone Number</label>
                <input type="tel" name="userPhoneNo" required>
                <label>Address</label>
                <input type="text" name="userAddress" required>
                <label>Email</label>
                <input type="email" name="userEmail" required>
                <label>Password</label>
                <input type="password" name="userPassword" required>
                <input type="submit" name="" value="Submit">
            </form>
            <p>Already have an account? <a href="LogIn.html">Login Here</a></p>
        </div>
    </body>
</html>