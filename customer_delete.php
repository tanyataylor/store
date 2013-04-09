<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "DELETE FROM Customer WHERE cust_id = '" . $_GET['cust_id'] . "'";
$result = mysql_query($sql);
if(!$result){
    die("Invalid query: " . mysql_error());
}

mysql_close($link);
?>
<script>window.location = 'customer_listing.php'</script>