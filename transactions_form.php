<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

$action = 'transactions_insert.php';
if(isset($_GET['transaction_id'])){
    include 'db.php';
    $sql = "SELECT transaction_id, cust_id, date FROM Transactions WHERE transaction_id = '"
        . $_GET['transaction_id'] . "'";
    $result = mysql_query($sql);
    if(!$result){
        die('Invalid query: ' . mysql_error());
    }
    if($row = mysql_fetch_assoc($result)){
        $transaction_id = $row['transaction_id'];
        $cust_id = $row['cust_id'];
        $data = $row['data'];
        $action = 'transactions_update.php';
    }
    mysql_close($link);
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type='hidden' name="old_transaction_id" value="<?php echo $transaction_id;?>"/>
        <tr><td>Transaction ID</td><td><input type="text" name="transaction_id" value="<?php echo $transaction_id;?>"/></td></tr>
        <tr><td>Customer ID</td><td><input type="text" name="cust_id" value="<?php echo $cust_id;?>"/></td></tr>
        <tr><td>Date</td><td><input type='text' name='date' value="<?php echo $date;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
    </form>
</table>
