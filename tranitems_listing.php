<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'my_menu.php';
include 'db.php';

$sql = "SELECT item_id, transaction_id FROM Transaction_Items";
$result = mysql_query($sql);
if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Item ID</th><th>Transaction ID</th></tr>

    <?php
    while ($row = mysql_fetch_assoc($result)){
        $key = "item_id=" . $row['item_id'] . "&transaction_id=" . $row['transaction_id'];
        echo "<tr><td><a href='tranitems_delete.php?" . $key . "'>DELETE</a>" .
            "</td><td><a href='tranitems_form.php?" . $key . "'>UPDATE</a>" .
            "</td><td>" . $row['item_id'] .
            "</td><td>" .$row['transaction_id'] .
            "</td></tr>";
    }
    mysql_close($link);
?>
</table>
    <a href="tranitems_form.php">Add new transaction</a>