<pre><?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

$action = 'inventory_insert.php';
if(isset($_GET['item_id'])){
    include 'db.php';
    $sql = "SELECT item_id, item_code, item_department, item_description, item_price FROM Inventory where
    item_id = '" . $_GET['item_id'] . "'";
    $result = mysql_query($sql);
    if (!$result){
        die ('Invalid query: ' . mysql_error());
    }
    if ($row = mysql_fetch_assoc($result)){
        $item_id = $row['item_id'];
        $item_code = $row['item_code'];
        $item_department = $row['item_department'];
        $item_description = $row['item_description'];
        $item_price = $row['item_price'];
        $action = 'inventory_update.php';
    }
    mysql_close($link);
}
?>
    <table>
        <form action="<?php echo $action;?>">
            <input type="hidden" name="old_item_id" value="<?php echo $item_id;?>" />
            <tr><td>Item ID</td><td><input type="text" name="item_id" value="<?php if(!empty($item_id))echo $item_id;?>"/></td></tr>
            <tr><td>Item Code</td><td><input type="text" name="item_code" value="<?php if(!empty($item_code)) echo $item_code;?>"/></td></tr>
            <tr><td>Item Department</td><td><input type="text" name="item_department" value="<?php if(!empty($item_department)) echo $item_department;?>"/></td></tr>
            <tr><td>Item Description</td><td><input type="text" name="item_description" value="<?php if(!empty($item_description)) echo $item_description;?>"/></td></tr>
            <tr><td>Item Price</td><td><input type="text" name="item_price" value="<?php if(!empty($item_price)) echo $item_price;?>"/></td></tr>
            <tr><td></td><td><input type="submit" value="Save"/></td></tr>
            </form>
        </table>













