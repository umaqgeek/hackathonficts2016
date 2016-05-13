<?php
require("dbconn.php");

$username = $_POST['username'];

$sql = "SELECT * "
        . "FROM driver_destination dd, users1 u, location lo "
        . "WHERE dd.u_id = u.u_id "
        . "AND u.u_user_no = '" . $username . "' "
        . "GROUP BY dd.dd_id ";
$r = mysql_query($sql) or die("Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);
?>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#.</th>
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
                
                $dd_id = $d['dd_id'];
                
                $lo_id_from = $d['lo_id_from'];
                $sql = "SELECT * FROM location WHERE lo_id = '" . $lo_id_from . "' ";
                $r11 = mysql_query($sql) or die("Error: " . mysql_error());
                $t11 = mysql_num_rows($r11);
                $d11 = mysql_fetch_array($r11);
                $lo_name1 = ($t11 > 0) ? ($d11['lo_name']) : ("<Unknown>");
                
                $lo_id_to = $d['lo_id_to'];
                $sql = "SELECT * FROM location WHERE lo_id = '" . $lo_id_to . "' ";
                $r12 = mysql_query($sql) or die("Error: " . mysql_error());
                $t12 = mysql_num_rows($r12);
                $d12 = mysql_fetch_array($r12);
                $lo_name2 = ($t12 > 0) ? ($d12['lo_name']) : ("<Unknown>");
        ?>
        <tr>
            <td><?=$ii++; ?></td>
            <td><?=$lo_name1; ?></td>
            <td><?=$lo_name2; ?></td>
            <td><?php 
            $status = $d['dd_status'];
            ?>
                <input type="radio" class="status_tekan" name="status" id="status_<?=$ii-1; ?>" value="<?=$dd_id; ?>" 
                    <?php if ($status == 2) { ?>checked<?php } ?> />
            </td>
        </tr>
        <?php
            } while ($d = mysql_fetch_array($r));
        } else {
        ?>
        <tr>
            <td colspan="4">
                <em>.. No Data ..</em>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {
        $(".status_tekan").click(function () {
            var ddid = $(this).val();
            
            $.post(URL_SERVER + "driver_setup_destination.php", {
                ddid: ddid,
                username: localStorage.getItem("username")
            }).done(function (data) {
                var d = data.split("|");
                if (d[0] == '-1') {
                    
                    $("#paparan").addClass("alert-success p_hack").html(d[1]).delay(2000).queue(function () {
                        $(this).removeClass("alert-success p_hack").html("");
                    });
                    
                    $.post(URL_SERVER + "driver_papar_driver_destination.php", {
                        username: localStorage.getItem("username")
                    }).done(function (data) {
                        $("#papar_data1").html(data);
                    });
                    
                } else if (d[0] == '1') {
                    
                    $("#paparan").addClass("alert-danger p_hack").html(d[1]).delay(2000).queue(function () {
                        $(this).removeClass("alert-danger p_hack").html("");
                    });
                }
            });
        });
    });
</script>