<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include "db.php";

$sql = "DELETE FROM Address WHERE cust_id = "
    . $_GET['cust_id']  . " and address_type = '" . $_GET['address_type'] . "'" ;

$result = mysql_query($sql);
if (!$result){
    die("Invalid query: " . mysql_error());
}

mysql_error($link);
?>

<script>window.location = 'address_listing.php'</script>
