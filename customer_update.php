<pre><?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "UPDATE Customer SET user_login = '"
    . $_GET['user_login'] . "'," . "user_pass = '"
    . $_GET['user_pass'] . "'," . "first_name = '"
    . $_GET['first_name'] . "'," . "last_name = '"
    . $_GET['last_name'] . "',". "SSN = '"
    . $_GET['SSN'] . "' where cust_id = "
    . $_GET['cust_id'] . ";";

$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}

mysql_close($link);
?>
<script>window.location = 'customer_listing.php'</script>