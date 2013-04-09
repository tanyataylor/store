<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
include "db.php";

$sql = "UPDATE Address_Type SET address_type_id = "
    . $_GET['address_type_id'].","
    . "address_type = ' "
    . $_GET['address_type']
    . "' where address_type_id = ' "
    . $_GET['old_address_type_id']. "';";

$result = mysql_query($sql);

if(!$result){
    die('Invalid query: ' . mysql_error());
}

mysql_close($link);

?>
<script>window.location = 'addrtype_listing.php'</script> //defines a client - side script, such as java script
//what page is loaded into the browser - redirect to that site - url