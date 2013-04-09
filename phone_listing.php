<?php

// all errors and warnings, except E_STRICT - will be a part of E_ALL as of PHP 6.0
// E_STRICT - run-time notices. PHP suggest changes to your code to help compability and interability of the code
error_reporting(E_ALL | E_STRICT); //sets error_reporting at the run time - ( level of the reporting during runtime )
ini_set('display_errors', 1);

include 'my_menu.php';
include 'db.php';

$sql = "SELECT cust_id, phone_type, phone_number from Phone";
$result = mysql_query($sql);
if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Customer ID</th><th>Phone Type</th><th>Phone Number</th></tr>
    <?php
    while ($row = mysql_fetch_assoc($result)){
        echo "<tr><td><a href='phone_delete.php?cust_id=" . $row['cust_id'] . "&phone_type=" . $row['phone_type'] . "'>DELETE</a>" .
            "</td><td><a href='phone_form.php?cust_id=" . $row['cust_id'] . "'>UPDATE</a>" .
            "</td><td>" . $row['cust_id'] .
            "</td><td>" . $row['phone_type'] .
            "</td><td>" . $row['phone_number'] .
            "</td></tr>";
    }
    mysql_close($link);
?>
</table>
    <a href="phone_form.php">Add new customer Phone</a>
        <a href="phone_form_count.php">Add another phone to Existing customer(PROCEDURE)</a>
