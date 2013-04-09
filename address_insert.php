<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1); //display_errors - errors printed on the screen or hidden. 1 or ON is the same?

include 'db.php';

$sql = "INSERT INTO Address (cust_id,address_type,street,house_apt,state,country,zip) VALUES("
    . "'" . $_GET['cust_id'] . "',"
    . "'" . $_GET['address_type'] . "',"
    . "'" . $_GET['street'] . "',"
    . "'" . $_GET['house_apt'] . "',"
    . "'" . $_GET['state'] . "',"
    . "'" . $_GET['country'] . "',"
    . "'" . $_GET['zip'] . "');";

$result = mysql_query($sql);

if (!$result){
    die('Invalid query: '. mysql_error());
}

mysql_close($link);

?>

<script>window.location = 'address_listing.php'</script>