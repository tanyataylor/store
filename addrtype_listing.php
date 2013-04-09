<?php
include "my_menu.php";
include "db.php";
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

$sql = "SELECT address_type_id, address_type from Address_Type Order by 1,2";
$result = mysql_query($sql); //resource on success false on fail
if(!$result){
    die("Invalid query: " . mysql_error());
}
?>
<table>
    <tr><th></th><th></th><th>Address ID</th><th>Address Type</th></tr>
<?php
    while ($row = mysql_fetch_assoc($result)){
        echo "<tr><td><a href='addrtype_delete.php?address_type_id=" . $row['address_type_id'].
         " '>DELETE</a>".
         "</td><td><a href='addrtype_form.php?address_type_id=" . $row['address_type_id'] . " '>UPDATE</a>" .
         "</td><td>" . $row['address_type_id'] .
         "</td><td>" . $row['address_type'].
         "</td></tr>";
    }
?>
</table>
<a href="addrtype_form.php">Add new address type</a>
