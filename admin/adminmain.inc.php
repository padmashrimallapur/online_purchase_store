<?php

$userid = $_SESSION['store_admin'];

$query = "SELECT name from admin WHERE userid = $userid";

$result = mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$name = $row['name'];

echo "<h2> Welcome , $name</h2><br>\n";

$date = date("I, F, j, Y");
echo "<h2>Todays Date : $date </h2><br>\n";
echo "<h2>Admin messages </h2>\n";

if(is_readable("mylibrary/dailymessages.txt")){
    $messsage = file_get_contents("/mylibrary/dailymessages.txt");
    $message = nl2br($message);
    echo $message;
}
else{
    echo "No messages for today.\n";
}

echo "<h2><br>Products currently on sale</h2>\n";

$query = "SELECT prodid, decription, price, quantity From products WHERE onsale=1";
$result = mysql_query($query);

while ($row = mysql_num_rows($result, MYSQLI_ASSOC)){
    $productid = $row['prodid'];
    $decription = $row['description'];
    $price = $row['price'];
    $quantity = $row['quantity'];

    printf("<a href=\"admin.php?content=updateproduct&$prodid\" >%s </a > -$%.2lf\n", $description, $price);
     if ($quantity == 0)
         echo "<font color = \"ff0000\"> OUT OF STOCK </font><br>\n";
      else
         echo "<br>";
}
   
        
?>