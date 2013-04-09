<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);
$action = 'customer_insert.php';
if(isset($_GET['cust_id'])){
    include 'db.php';
    $sql = "SELECT cust_id, user_login, user_pass, first_name, last_name, SSN FROM Customer WHERE cust_id = "
    . $_GET['cust_id'];
    $result = mysql_query($sql);
    if(!$result){
        die("Invalid query: " . mysql_error());
    }
    if ($row = mysql_fetch_assoc($result)){
        $user_login = $row['user_login'];
        $user_pass = $row['user_pass'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $SSN = $row['SSN'];
        $action = 'customer_update.php';
    }
    mysql_close($link);
}
?>
<table>
    <form action="<?php echo $action;?>">
        <input type='hidden' name='cust_id' value="<?php echo $_GET['cust_id'];?>"/>
        <tr><td>User Login</td><td><input type="text" name="user_login" value="<?php if(!empty($user_login)) echo $user_login;?>"/></td></tr>
        <tr><td>User Pass</td><td><input type="text" name="user_pass" value="<?php if(!empty($user_pass)) echo $user_pass;?>"/></td></tr>
        <tr><td>First Name</td><td><input type="text" name="first_name" value="<?php if (!empty($first_name)) echo $first_name;?>"/></td></tr>
        <tr><td>Last Name</td><td><input type="text" name="last_name" value="<?php if(!empty($last_name)) echo $last_name;?>"/></td></tr>
        <tr><td>SSN</td><td><input type="text" name="SSN" value="<?php if (!empty($SSN)) echo $SSN;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
    </form>
</table>
