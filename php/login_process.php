<?php
require("dbconn.php");

$user_no = $_POST['user_no'];
$password = $_POST['password'];

$sql = "SELECT * FROM users1 WHERE u_user_no = '" . $user_no . "' AND u_password = '" . $password . "' ";
$r = mysql_query($sql) or die("1|Error: " . mysql_error());
$t = mysql_num_rows($r);

if ($t > 0) {
    
    $d = mysql_fetch_array($r);
    $ut_id = $d['ut_id'];
    $u_id = $d['u_id'];
    
    if ($ut_id == 1 || $ut_id == 2) {
        $sql = "UPDATE users1 SET u_status = '2' WHERE u_id = '" . $u_id . "' ";
        mysql_query($sql) or die("1|Cannot login!");
    }
    
    if ($ut_id == 1) {
        die("-1|student_mainpage.html");
    } else if ($ut_id == 2) {
        die("-1|driver_mainpage.html");
    } else {
        die("1|Invalid user!");
    }
    
} else {
    die("1|Invalid matric or staff number!");
}
?>