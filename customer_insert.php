<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);
include 'db.php';

$sql = "INSERT INTO Customer (user_login, user_pass, first_name, last_name, SSN) VALUES ("
    . "'" . $_GET['user_login'] . "',"
    . "'" . $_GET['user_pass'] . "',"
    . "'" . $_GET['first_name'] . "',"
    . "'" . $_GET['last_name'] . "',"
    . "'" . $_GET['SSN'] .  "');";
$result = mysql_query($sql);
if(!$result){
    die("Invalid query: " . mysql_error());
}
mysql_close($link);

?>

<script>window.location = 'customer_listing.php'</script>
