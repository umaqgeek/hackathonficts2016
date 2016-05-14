<?php
require("dbconn.php");

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users1 WHERE u_user_no = '" . $user . "' AND u_password = '" . $pass . "' ";
$r = mysql_query($sql) or die("1|Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

if ($t > 0) {
    
    $u_fullname = $d['u_fullname'];
    $u_user_no = $d['u_user_no'];
    $u_password = $d['u_password'];
    die("-1|" . $u_fullname . "|" . $u_user_no . "|" . $u_password);
    
} else {
    
    die("2|Invalid user!");
}

?>