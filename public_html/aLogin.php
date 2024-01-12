<?php 
//ob_start();
session_start();

include("userdb.php");


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['admin_emailadd'];
    $password = $_POST['admin_password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
        $query = "SELECT * FROM admin_profile WHERE admin_emailadd = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data["admin_password"] == $password)
                {
                    $_SESSION['login_admin'] = $email;
                    header("location:Admin/Admin-Dashboard.html");
                    die;
                }
            }
        }
        echo"<script type='text/javascript'>alert('Incorrect username and password'); window.location='aLogin.html';</script>";
    }
    else{
        echo"<script type='text/javascript'>alert('Incorrect username and password'); window.location='aLogin.html';</script>";
    }
}

?>