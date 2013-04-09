<?php
$action = 'addrtype_insert.php';
if(isset($_GET['address_type_id'])){
    include 'db.php';
    $sql = "SELECT address_type_id, address_type from Address_Type where address_type_id = " . $_GET['address_type_id'];
    $result = mysql_query($sql);
    if(!$result){
        die('Invalid query: ' . mysql_error());
    }
    if ($row = mysql_fetch_assoc($result)){
        $address_type_id = $row['address_type_id'];
        $address_type = $row['address_type'];
        $action = 'addrtype_update.php';
    }
    mysql_close($link);
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type="hidden" name="old_address_type_id" value="<?php echo $address_type_id; ?>" />
        <tr><td>Address ID</td><td><input type="text" name="address_type_id" value="<?php echo $address_type_id;?>"/></td></tr>
        <tr><td>Address Type</td><td><input type="text" name="address_type" value="<?php echo $address_type;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
    </form>
</table>








