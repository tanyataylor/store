<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

include 'db.php';
?>
<table>
    <form action="phone_count_insert.php">
        <tr><td>Customer ID</td><td>
        <select name="cust_id">
            <?php
            $sql = "SELECT DISTINCT cust_id FROM Phone ORDER BY cust_id";
            $result = mysql_query($sql);
            while ($row = mysql_fetch_assoc($result)){
                echo '<option value=" ' . $row['cust_id'] . ' ">' . $row['cust_id'] . '</option>';
            }
            ?>
            </select>
        </td></tr>
        <tr><td>Phone Type</td><td>
            <select name='phone_type'>
                <?php
                $sql = "SELECT DISTINCT phone_type FROM Phone ORDER BY phone_type";
                $result = mysql_query($sql);
                while ($row = mysql_fetch_assoc($result)){
                    echo '<option value=" ' . $row['phone_type'] . ' ">' . $row['phone_type'] . '</option>';
                }
                ?>
            </select>
        </td></tr>
        <tr><td>Phone Number</td><td><input type="text" name = "phone_number"
                                           value = "<?php if(!empty($phone_number)) echo $phone_number;?>"/></td></tr>
        <tr><td></td><td><input type="submit" value="Save"/></td></tr>
        </form>
</table>

<?php
mysql_close($link);
?>