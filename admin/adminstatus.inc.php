<?php

if(isset($_SESSION['store_admin'])) {

    $con = mysqli_connect("localhost", "root", "", "store") or die("could not connect to the database");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    echo "<h2>Current store status </h2>";
    echo "<table width=\"100%\" cellpadding=\"1\" border=\"1\">\n";

    $query = "SELECT prodid from products";
    $result = mysqli_query($con, "SELECT prodid from products");
    $totprod = mysqli_num_rows($result);

    echo "<tr><td><h2> Products in store</h2></td><td>$totprod</td></tr>\n";

    $query = "SELECT prodid FROM product WHERE quantity = '0'";
    $result = mysqli_query($con, "SELECT prodid FROM products WHERE quantity = '0'");
    $totOutOfStockProd = mysqli_num_rows($result);

    echo "<tr><td><h2>Products out of stock</h2></td><td>$totOutOfStockProd</td></tr>\n";

    $query = "SELECT orderid FROM orders WHERE status = 'pending' ";
    $result = mysqli_query($con, "SELECT orderid FROM orders WHERE status = 'pending'");
    $totPending = mysqli_num_rows($result);

    echo "<tr><td><h2>Orders pending</h2></td><td>$totPending</td></tr>\n";

    echo "</table>\n";

}



?>

