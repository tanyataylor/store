<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include 'db.php';

$sql = "DELETE FROM Phone where cust_id = '" . $_GET['cust_id'] . "' and phone_type= '" . $_GET['phone_type'] . "'";
$result = mysql_query($sql);
if(!$result){
    die ("Invalid query: " . mysql_error());
}

mysql_close($link);

?>
<script>window.location = 'phone_listing.php'</script>