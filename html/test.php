<?php

require_once ('inc/class-dbRead.php');

$test = new dbRead();
$test->connect();
$test->getDate();

?>
