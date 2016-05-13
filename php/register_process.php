<?php
require("dbconn.php");

$arr1 = $_POST;
$ii = 0;
$arr = array();
foreach ($arr1 as $ar1=>$ar1val) {
    $arr[$ii++] = $ar1val;
}
$sql = "INSERT INTO users1(u_fullname, u_user_no, u_password, ut_id) VALUES(";

for ($i=0; $i<sizeof($arr)-1; $i++) {
    $sql .= "'" . $arr[$i] .  "',";
}
if (sizeof($arr) > 0) {
    $sql .= "'" . $arr[sizeof($arr)-1] . "')";
}

mysql_query($sql) or die("1|Error: ".  mysql_error());

die("-1|Register Success.");

?>