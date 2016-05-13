<?php
require("dbconn.php");

$sql = "SELECT * 
    FROM driver_location dl, users1 u, driver_destination dd 
    WHERE dl.u_id = u.u_id 
    AND u.u_id = dd.u_id 
    AND u.ut_id = 2 
    AND dd.dd_status = 2";
$r = mysql_query($sql) or die("Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);
?>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#.</th>
            <th>Driver</th>
            <th>Location From</th>
            <th>Location To</th>
            <th>Status</th>
            <th>View</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>