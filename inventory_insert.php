<pre>
<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';

$sql = "INSERT INTO Inventory (item_id, item_code, item_department, item_description, item_price) VALUES ("
    . "'" . $_GET['item_id'] . "',"
    . "'" . $_GET['item_code'] . "',"
    . "'" . $_GET['item_department'] . "',"
    . "'" . $_GET['item_description'] . "',"
    . "'" . $_GET['item_price'] . "');";

$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
mysql_close($link);
?>
<script>window.location = 'inventory_listing.php'</script>