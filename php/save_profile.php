<?php
require("dbconn.php");

$full = $_POST['u_fullname'];
$pass = $_POST['u_password'];
$user = $_POST['username'];

$sql = "UPDATE users1 SET u_fullname = '" . $full . "', u_password = '" . $pass . "' WHERE u_user_no = '" . $user . "' ";
mysql_query($sql) or die("1|Error: " . mysql_error());
die("-1|Save success. Please login again. ..");

?>