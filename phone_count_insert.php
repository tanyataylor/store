<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);
$mysqli = new mysqli('localhost','root','123123','cust');
if ($mysqli->connect_errno){
    echo "Connection failed: " . $mysqli->connect_error;
    exit();
}

$sql = "CALL add_phone(" . $_GET['cust_id'] . ",'" . $_GET['phone_type'] ."', '" . $_GET['phone_number'] . "',@x);";
$result = $mysqli->query($sql);

if(!$result){
    die("Invalid query: " . $mysqli->error);
}
//else {
 //   $mysqli->next_result();
//}

$result = $mysqli->query("SELECT @x as result");
if(!$result){
    die("Invalid query: " . $mysqli->error);
}
$row = $result->fetch_assoc();
$mysqli->close();
if($row['result'] == 'OK')
{
    ?>
<script>window.location = 'phone_listing.php'</script>
<?php
}
else echo $row['result'];
?>

