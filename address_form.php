<pre>
<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$action = 'address_insert.php';
if(isset($_GET['cust_id'])){
    include 'db.php';
    $sql = "SELECT cust_id,address_type,street,house_apt,state,country,zip FROM Address where cust_id = '"
    . $_GET['cust_id'] . "'";
    $result = mysql_query($sql);
    if(!$result){
        die("Invalid query: " . mysql_error());
    }
    if ($row = mysql_fetch_assoc($result)){
        $cust_id = $row['cust_id'];
        $address_type = $row['address_type'];
        $street = $row['street'];
        $house_apt = $row['house_apt'];
        $state = $row['state'];
        $country = $row['country'];
        $zip = $row['zip'];
        $action = 'address_update.php';
    }
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type="hidden" name='old_cust_id' value="<?php echo $cust_id;?>"/>
        <input type="hidden" name='old_address_type' value="<?php echo $address_type;?>"/>
        <tr><td>Customer ID</td><td><input type="text" name="cust_id" value="<?php if(!empty($cust_id)) echo $cust_id;?>"/></td></tr>
        <tr><td>Address Type</td><td><input type="text" name="address_type" value="<?php if(!empty($address_type)) echo $address_type;?>"/></td></tr>
        <tr><td>Street</td><td><input type="text" name="street" value="<?php if(!empty($street))echo $street;?>"/></td></tr>
        <tr><td>House_Apt</td><td><input type="text" name="house_apt" value="<?php if(!empty($house_apt))echo $house_apt;?>"/></td></tr>
        <tr><td>State</td><td><input type="text" name="state" value="<?php if(!empty($state))echo $state;?>"/></td></tr>
        <tr><td>Country</td><td><input type="text" name="country" value="<?php if(!empty($country))echo $country;?>"/></td></tr>
        <tr><td>Zip</td><td><input type="text" name="zip" value="<?php if(!empty($zip)) echo $zip;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
    </form>
</table>
