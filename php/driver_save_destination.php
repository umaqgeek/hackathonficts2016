<?php
require("dbconn.php");

$u_user_no = $_POST['username'];
$lo_id_from = $_POST['from'];
$lo_id_to = $_POST['to'];

$sql = "SELECT * FROM users1 WHERE u_user_no = '" . $u_user_no . "' ";
$r = mysql_query($sql) or die("1|Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

if ($t > 0) {
    
    $u_id = $d['u_id'];
    $sql = "INSERT INTO driver_destination(u_id, lo_id_from, lo_id_to) VALUES('" . $u_id . "', '" . $lo_id_from . "', '" . $lo_id_to . "') ";
    mysql_query($sql) or die("1|Error: " . mysql_error());
    die("-1|Insert success. ..");
    
} else {
    die("1|Invalid user!");
}

?>