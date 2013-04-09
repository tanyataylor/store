<?php

$link = mysql_connect('localhost', 'root', '123123');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db('cust', $link);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
}
?>