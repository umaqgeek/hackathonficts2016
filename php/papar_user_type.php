<?php
require("dbconn.php");

$sql = "SELECT * FROM users_type ";
$r = mysql_query($sql) or die("No user type available!");
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

if ($t > 0) {
    echo "<select id='ut_id' class='form-control'>";
    do {
        $ut_id = $d['ut_id'];
        $ut_desc = $d['ut_desc'];
        echo "<option value='" . $ut_id . "'>" . $ut_desc . "</option>";
    } while ($d = mysql_fetch_array($r));
    echo "</select>";
}
?>