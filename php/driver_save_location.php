<?php
require("dbconn.php");

$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$username = $_POST['username'];

$sql = "SELECT * FROM users1 WHERE u_user_no = '" . $username . "' ";
$r = mysql_query($sql) or die("1|Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

if ($t > 0) {
    
    $u_id = $d['u_id'];
    $dl_lat_lon = $latitud . ", " . $longitud;
    
    $sql = "SELECT * FROM driver_location WHERE u_id = '" . $u_id . "' ";
    $r1 = mysql_query($sql) or die("1|Error: " . mysql_error());
    $t1 = mysql_num_rows($r1);
    if ($t1 > 0) {
        $sql = "UPDATE driver_location SET dl_lat_lon = '" . $dl_lat_lon . "' WHERE u_id = '" . $u_id . "' ";
        mysql_query($sql);
    } else {
        $sql = "INSERT INTO driver_location(u_id, dl_lat_lon) VALUES('" . $u_id . "', '" . $dl_lat_lon . "') ";
        mysql_query($sql);
    }
    die("-1|ok ..");
    
} else {
    
    die("1|Invalid user!");
}

?>