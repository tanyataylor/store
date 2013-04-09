<?php
//error_reporting(E_ALL|E_STRICT);
//ini_set('display_errors',1);

$action = 'tranitems_insert.php';
include 'db.php';

if(isset($_GET['item_id'])){
    $sql = "SELECT item_id, transaction_id FROM Transaction_Items WHERE " .
        "item_id = '" . $_GET['item_id'] .
        "' and transaction_id = '" . $_GET['trasaction_id'] . "'";
    $result = mysql_query($sql);
    if(!$result){
        die("Invalid query: " . mysql_error());
    }
    if($row= mysql_fetch_assoc($result)){
        $item_id = $row['item_id'];
        $transaction_id = $row['transaction_id'];
        $action = 'tranitems_update.php';
    }
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type="hidden" name="old_item_id" value="<?php echo $item_id;?>"/>
        <tr><td>Item ID</td><td><input type="text" name="item_id" value="<?php echo $item_id;?>"></td></tr>
        <tr><td>Transaction ID</td><td><input type="text" name="transaction_id" value="<?php echo $transaction_id;?>"></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
    </form>
</table>

