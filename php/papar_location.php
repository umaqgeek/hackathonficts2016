<?php
require("dbconn.php");

$sql = "SELECT * FROM location ";
$r = mysql_query($sql) or die("No location available!");
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

$stat = $_POST['stat'];
$lo_name = (isset($stat) && !empty($stat)) ? (($stat == '1') ? ("from") : ("to")) : ("from");

if ($t > 0) {
    echo "<select id='lo_id_" . $lo_name . "' class='form-control'>";
    do {
        $ut_id = $d['lo_id'];
        $ut_desc = $d['lo_name'];
        echo "<option value='" . $ut_id . "'>" . $ut_desc . "</option>";
    } while ($d = mysql_fetch_array($r));
    echo "</select>";
}
?>