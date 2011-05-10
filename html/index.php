<?php

$user="weight";
$password="pass";
$database="weight_chart";
$link = mysql_connect("localhost",$user,$password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Can\'t use database : ' . mysql_error());
    }

$query = "INSERT INTO daily_weight VALUE ('','2011-05-09','300')";
mysql_query($query);

mysql_close ($link);

?>
