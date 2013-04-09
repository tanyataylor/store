<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$action = 'phone_insert.php';
if(isset($_GET['cust_id'])){
    include 'db.php';
    $sql = "SELECT cust_id, phone_type, phone_number FROM Phone where cust_id = '" . $_GET['cust_id'] . " ' ";
    $result = mysql_query($sql);
    if (!$result){
        die ("Invalid query: " . mysql_error());
    }
    if($row = mysql_fetch_assoc($result)){
        $cust_id = $row['cust_id'];
        $phone_type = $row['phone_type'];
        $phone_number = $row['phone_number'];
        $action = 'phone_update.php';
    }
    mysql_close($link);
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type = "hidden" name = "old_cust_id" value="<?php echo $cust_id;?>" />
        <tr><td>Customer ID</td><td><input type="text" name = "cust_id" value="<?php if(!empty($cust_id)) echo $cust_id;?>"/></td></tr>
        <tr><td>Phone Type</td><td><input type="text" name = "phone_type" value = "<?php if(!empty($phone_type)) echo $phone_type;?>"/></td></tr>
        <tr><td>Phone Number</td><td><input type="text" name = "phone_number" value = "<?php if(!empty($phone_number)) echo $phone_number;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
           </form>
</table>

