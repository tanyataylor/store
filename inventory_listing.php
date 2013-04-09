<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'my_menu.php';
include 'db.php';

$sql = "SELECT item_id, item_code, item_department, item_description, item_price FROM Inventory";
$result = mysql_query($sql);
if(!$result){
    die('Invalid query: ' . mysql_error());
}
?>
    <table>
        <tr><th></th><th></th><th>Item ID</th><th>Item Code</th><th>Item Department</th><th>Item Description</th><th>Item Price</th></tr>
        <?php
        while($row = mysql_fetch_assoc($result)){
            echo "<tr><td><a href='inventory_delete.php?item_id=" . $row['item_id'] . "'>DELETE</a>" .
            "</td><td><a href='inventory_form.php?item_id=" . $row['item_id'] . "'>UPDATE</a>" .
                "</td><td>" . $row['item_id'] .
                "</td><td>" . $row['item_code'] .
                "</td><td>" . $row['item_department'] .
                "</td><td>" . $row['item_description'] .
                "</td><td>" . $row['item_price'] .
                "</td></tr>";
        }
        mysql_close($link);
?>
    </table>
    <a href='inventory_form.php'>Add new Inventory Item</a>