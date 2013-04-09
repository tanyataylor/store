<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "UPDATE Transactions SET transaction_id = '"
    . $_GET['transaction_id'] . "'," . "cust_id = '" . $_GET['cust_id'] . "', date = '"
    . $_GET['date'] . "' where transaction_id = '"
    . $_GET['old_transaction_id'] . "';";
$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
mysql_close($link);
?>

<script>window.location = 'transactions_listing.php'</script>