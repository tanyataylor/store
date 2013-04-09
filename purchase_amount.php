<?php
include 'my_menu.php';
include 'db.php';

$sql = "SELECT cust_id, transaction_id, item_code, item_department, item_description, item_price FROM purchase_amount";
$result = mysql_query($sql);
if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th>Customer ID</th><th>Transaction ID</th><th>Item Code</th><th>Item Department</th><th>Item Description</th><th>Item Price</th></tr>
    <?php
    while ($row = mysql_fetch_assoc($result)){
        echo "<tr><td>" . $row['cust_id'] .
            "</td><td>" . $row['transaction_id'] .
            "</td><td>" . $row['item_code'] .
            "</td><td>" . $row['item_department'] .
            "</td><td>" . $row['item_description'] .
            "</td><td>" . $row['item_price'] .
            "</td></tr>";
    }
    mysql_close($link);
?>

</table>
    <a href="rating.php">Find Out Membership Rating (FUNCTION)</a>
