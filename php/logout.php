<?php
require("dbconn.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE users1 SET u_status = '1' WHERE u_user_no = '" . $username . "' AND u_password = '" . $password . "' ";
mysql_query($sql) or die("1|Error: " . mysql_error());
die("-1|Ok.");

?>