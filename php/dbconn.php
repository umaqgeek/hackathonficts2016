<?php
$conn = mysql_connect("localhost", "root", "");
if (!$conn) {
    die("No connection to database!");
}
mysql_select_db("ibs_db");
?>
