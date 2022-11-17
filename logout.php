<?php
session_start();
$_SESSION=array();
session_destroy();
header('location:index.htm');
exit();
?>
<br><br><a href="index.htm">Home Page</a><br>
