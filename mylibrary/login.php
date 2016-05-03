<?php
/**
 * Created by PhpStorm.
 * User: padmashri
 * Date: 2016-04-28
 * Time: 4:23 PM
 */


function login(){

    $con = mysqli_connect("localhost", "root", "", "store") or die("could not connect to the database");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}
?>