<?php
require("dbconn.php");

$sql = "SELECT * 
    FROM driver_location dl, users1 u, driver_destination dd, arrival_status as1 
    WHERE dl.u_id = u.u_id 
    AND u.u_id = dd.u_id 
    AND dd.as_id = as1.as_id 
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
        </tr>
    </thead>
    <tbody>
        <?php
        $ii = 1;
        if ($t > 0) {
            do {
        ?>
        <tr>
            <td><?=$ii++; ?>.</td>
            <td><?=$d['u_fullname']; ?></td>
            <td><?php
            $lo_id_from = $d['lo_id_from'];
            $sql = "SELECT * FROM location WHERE lo_id = '" . $lo_id_from . "' ";
            $r1 = mysql_query($sql) or die("Error: " . mysql_error());
            $t1 = mysql_num_rows($r1);
            $d1 = mysql_fetch_array($r1);
            echo ($t1 > 0) ? ($d1['lo_name']) : ("<Unknown>");
            ?></td>
            <td><?php
            $lo_id_to = $d['lo_id_to'];
            $sql = "SELECT * FROM location WHERE lo_id = '" . $lo_id_to . "' ";
            $r2 = mysql_query($sql) or die("Error: " . mysql_error());
            $t2 = mysql_num_rows($r2);
            $d2 = mysql_fetch_array($r2);
            echo ($t2 > 0) ? ($d2['lo_name']) : ("<Unknown>");
            ?></td>
            <td>
                <?=$d['as_desc']; ?>
            </td>
<!--            <td>
                <button type="button" class="btn btn-link btn_status" t="<?=$d['u_id']; ?>">
                    <?=$d['as_desc']; ?>
                </button>
            </td>-->
        </tr>
        <?php 
            } while ($d = mysql_fetch_array($r));     
        } ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
//        $(".btn_status").click(function () {
//            var t = $(this).attr("t");
//            
//            
//            $.post(URL_SERVER + "student_ajax_papar_peta.php", {
//            }).done(function (data) {
//                $("#papar_peta1").html(data);
//            });
//        });
    });
</script>
