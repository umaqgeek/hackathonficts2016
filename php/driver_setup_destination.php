<?php
require("dbconn.php");

$dd_id = $_POST['ddid'];
$u_user_no = $_POST['username'];

$sql = "SELECT * FROM users1 WHERE u_user_no = '" . $u_user_no . "' ";
$r = mysql_query($sql) or die("1|Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

if ($t > 0) {
    $u_id = $d['u_id'];
    $sql = "UPDATE driver_destination SET dd_status = '1' WHERE u_id = '" . $u_id . "' ";
    mysql_query($sql) or die("1|Error: " . mysql_error());
    $sql = "UPDATE driver_destination SET dd_status = '2' WHERE dd_id = '" . $dd_id . "' ";
    mysql_query($sql) or die("1|Error: " . mysql_error());
    die("-1|Set success. ..");
} else {
    die("1|Invalid user!");
}

?>