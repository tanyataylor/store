<?php
include 'my_menu.php';
include 'db.php';

$sql = "SELECT cust_id,address_type,street,house_apt,state,country,zip FROM Address";
$result = mysql_query($sql);
if (!result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Cust ID</th><th>Address</th><th>Street</th><th>House</th><th>State</th><th>Country</th><th>Zip</th></tr>
    <?php
    while ($row = mysql_fetch_assoc($result)){
        $key = "cust_id=" . $row['cust_id'] . "&address_type=" . $row['address_type'];
        echo "<tr><td><a href='address_delete.php?" . $key . "'>DELETE</a>" .
        "</td><td><a href='address_form.php?" . $key . "'>UPDATE</a>" .
            "</td><td>" . $row['cust_id'] .
            "</td><td>" . $row['address_type'] .
            "</td><td>" . $row['street'] .
            "</td><td>" . $row['house_apt'] .
            "</td><td>" . $row['state'] .
            "</td><td>" . $row['country'] .
            "</td><td>" . $row['zip'] .
            "</td></tr>";
    }
    mysql_close($link);
?>
</table>
    <a href= 'address_form.php'>Add new address</a>