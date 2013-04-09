<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include 'db.php';

$sql = "UPDATE Phone SET cust_id = '" . $_GET['cust_id'] . "',"
    . "phone_type = '"  . $_GET['phone_type'] . "',"
    . "phone_number = "  . $_GET['phone_number']
    . " where cust_id = '"  . $_GET['old_cust_id'] . "';";

$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
mysql_close($link);

?>
<script>window.location = 'phone_listing.php'</script>
