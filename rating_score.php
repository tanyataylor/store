<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

if(isset($_POST["cust_id"])){
    include 'db.php';
    $sql = "SELECT SUM(item_price) FROM purchase_amount where cust_id = " . $_POST['cust_id'];
    $result = mysql_query($sql);
    if (!$result){
        die("Invalid query: " . mysql_error());
    }
    if($row = mysql_fetch_assoc($result)){
        $price = $row['SUM(item_price)'];
    }
    if($price){
        $func = "SELECT rating(" . $price . ") as rate";
        $func_result = mysql_query($func);

        if(!$func_result){
            die("Invalid query: ". mysql_error());
        }
        if($row = mysql_fetch_assoc($func_result)){
            $rating = $row['rate'];
        }
    }
    else
        $rating = 'customer Does Not Have Current Rating';


}

?>

<html>
<body>
Your Membership Rating is: <?php echo $rating;?><br>
<br>
Price Total Bought is: <?php echo $price;?> $
</body>
</html>