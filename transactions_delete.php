<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "DELETE FROM Transactions WHERE transaction_id = '" . $_GET['transaction_id'] . "'";
$result = mysql_query($sql);
if(!$result){
    die('Invalid query: ' . mysql_error());
}

mysql_close($link);
?>
<script>window.location = 'transactions_listing.php'</script>