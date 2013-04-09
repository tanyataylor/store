<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors',1);

$action = 'rating_score.php';
include 'db.php';

?>

<html>
<body>
<form action="<?php echo $action;?>" method="post">
    Input Customer ID <input type="text" name="cust_id">
    <input type="submit" value="Rate!">
</form>

</body>
</html>

