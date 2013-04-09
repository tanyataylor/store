<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include 'db.php';

$sql = "DELETE FROM Address_Type where address_type_id = " . $_GET['address_type_id'];
$result = mysql_query($sql);

if (!$result){
    die ("Invalid query: " . mysql_error());
}

mysql_close($link);

?>
<script>window.location = 'addrtype_listing.php'</script>