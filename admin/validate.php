<?php
/**
 * Created by PhpStorm.
 * User: padmashri
 * Date: 2016-04-28
 * Time: 10:14 PM
 */

session_start();

include("/mylibrary/login.php");
login();

$userid = $_POST['userid'];
$password = $_POST['password'];

$query = "SELECT userid, name from admins where userid = '$userid' and password = PASSWORD('$password')";
$result = mysql_query($query);

if(mysql_num_rows($result)==0) {
    echo "<h2>Sorry your account was not validated </h2><br>\h";
    echo "<a href=\"admin.php\"> try again </a><br>\n";
}
else{

    $_SESSION['store_admin'] = $userid;
    header("Location : admin.php");
}