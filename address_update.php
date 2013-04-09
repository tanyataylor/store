<pre>
<?php


error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

include 'db.php';

$sql = "UPDATE Address SET cust_id = '" . $_GET['cust_id'] . "',"
   . "address_type = '" . $_GET['address_type'] . "',"
    . "street = '" . $_GET['street'] . "',"
    . "house_apt = '" . $_GET['house_apt'] . "',"
    . "state = '" . $_GET['state'] . "',"
   . "country = '" . $_GET['country'] . "',"
    . "zip = '" . $_GET['zip'] . "'"
    . "where cust_id = '" . $_GET['old_cust_id'] . "' and address_type = '" . $_GET['old_address_type'] . "';";

$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}

mysql_close($link);

?>
   <script>window.location = 'address_listing.php'</script>
