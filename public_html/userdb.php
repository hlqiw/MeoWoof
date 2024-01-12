<?php

$dbhost = "localhost";
$dbuser = "id21727828_meowoof2023";
$dbpass = "Sns@1234";
$dbname = "id21727828_meowoof";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die("Failed to connect!");
}

?>