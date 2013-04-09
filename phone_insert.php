<?php
include 'db.php';

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
$sql = "INSERT INTO Phone (cust_id, phone_type, phone_number) VALUES ("
    . "'" . $_GET['cust_id'] . "',"
    . "'" . $_GET['phone_type'] . "',"
     . $_GET['phone_number'] . ");";
$result = mysql_query($sql);
if(!$result){
    die ("Invalid query: " . mysql_error());
}
mysql_error($link);
?>
<script>window.location = 'phone_listing.php'</script> <!-- redirects user to listing page -->









