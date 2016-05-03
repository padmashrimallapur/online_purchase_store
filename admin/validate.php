<?php
ob_start();

session_start();
include("../mylibrary/login.php");
login();

$userid = $_GET['userid'];
$password = $_GET['password'];

$con = mysqli_connect("localhost", "root", "", "store") or die("could not connect to the database");
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$query = "SELECT userid, name from admins where userid = '$userid' and password = PASSWORD('$password')";

//echo $query;
$result = mysqli_query($con,"SELECT userid, name from admins where userid = '$userid' and password = md5('$password') ");

if(mysqli_num_rows($result)==0) {
    echo "<h2>Sorry your account was not validated </h2><br>\h";
    echo "<a href=\"admin.php\"> try again </a><br>\n";
}
else{

    $_SESSION['store_admin'] = $userid;
    header("Location: admin.php");

}
?>