<?php

include "db.php";

$sql = "INSERT INTO Address_Type (address_type_id,address_type) VALUES ("
    . "'" . $_GET['address_type_id'] . "',"
    . "'" . $_GET['address_type'] . "');";



$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
 //mysql_close($link);
?>


<script>window.location = 'addrtype_listing.php'</script>

