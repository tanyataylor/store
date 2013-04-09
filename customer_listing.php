<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

include 'db.php';
include 'my_menu.php';

$sql = "SELECT cust_id, user_login, user_pass, first_name, last_name, SSN FROM Customer";
$result = mysql_query($sql);

if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Login</th><th>Password</th><th>First Name</th><th>Last Name</th><th>SSN</th></tr>
    <?php
    while ($row = mysql_fetch_assoc($result)){
        echo "<tr><td><a href='customer_delete.php?cust_id=" . $row['cust_id'] . "'>DELETE</a>" .
            "</td><td><a href='customer_form.php?cust_id=" . $row['cust_id'] . "'>UPDATE</a>" .
            "</td><td>" . $row['user_login'] .
            "</td><td>" . $row['user_pass'] .
            "</td><td>" . $row['first_name'] .
            "</td><td>" . $row['last_name']  .
            "</td><td>" . $row['SSN'] .
            "</td></tr>";
    }
    mysql_close($link);
?>
</table>
    <a href='customer_form.php'>Add new customer</a>
