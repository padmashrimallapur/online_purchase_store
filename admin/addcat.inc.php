<?php

$catname = $_GET['catname'];

$con = mysqli_connect("localhost", "root", "", "store") or die ("Can not connect to the mysql server");

if (mysqli_connect_errno()) {
    echo "error in connecting the mysql server";
}

$catnamevalue = mysqli_real_escape_string($con, $catname);
$query = "insert into categories (name) VALUES ('$catnamevalue')";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<h2>New category $catname has been added</h2>\n";
} else {
    echo "<h2>Sorry, unable to add new category</h2>";
}

?>  