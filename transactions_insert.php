<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "INSERT INTO Transactions (transaction_id, cust_id, date) VALUES("
    . "'" . $_GET['transaction_id'] . "',"
    . "'" . $_GET['cust_id'] . "',"
    . "'" . $_GET['date'] . "');";

$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}

mysql_close($link);
?>

<script>window.location = 'transactions_listing.php'</script>