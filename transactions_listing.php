<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'my_menu.php';
include 'db.php';

$sql = "SELECT transaction_id, cust_id, date FROM Transactions";
$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Transaction ID</th><th>Customer ID</th><th>Date</th></tr>
    <?php
    while($row = mysql_fetch_assoc($result)){
        echo "<tr><td><a href='transactions_delete.php?transaction_id=" . $row['transaction_id'] . "'>DELETE</a> " .
            "</td><td><a href='transactions_form.php?transaction_id=" . $row['transaction_id'] . "'>UPDATE</a>" .
            "</td><td>" . $row['transaction_id'] .
            "</td><td>" . $row['cust_id'] .
            "</td><td>" . $row['date'] .
            "</td></tr>";
    }
    mysql_close($link);
?>
</table>
    <a href="transactions_form.php">Add new transaction</a>