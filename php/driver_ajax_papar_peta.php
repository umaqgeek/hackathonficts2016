<?php
require("dbconn.php");

$sql = "SELECT * 
    FROM driver_location dl, users1 u 
    WHERE dl.u_id = u.u_id 
    AND u.ut_id = 1 
    AND u.u_status = 2 ";
$r = mysql_query($sql) or die("Error: " . mysql_error());
$t = mysql_num_rows($r);
$d = mysql_fetch_array($r);

$arr1 = array();
$loc = "";
$num = $t;
if ($t > 0) {
    $i = 0;
    do {
        $arr1[$i]['name'] = $d['u_fullname'] . "<br />" . $d['u_user_no'];
        $arr1[$i]['lat_lon'] = $d['dl_lat_lon'];
        $arr1[$i]['u_id'] = $d['u_id'];
        $i++;
    } while ($d = mysql_fetch_array($r));
    for ($j=0; $j<$i-1; $j++) {
        $name = $arr1[$j]['name'];
        $lat_lon = $arr1[$j]['lat_lon'];
        $u_id = $arr1[$j]['u_id'];
        $loc .= "['" . $name . "', " . $lat_lon . ", " . $u_id . "],";
    }
    if ($i > 0) {
        $name = $arr1[$i-1]['name'];
        $lat_lon = $arr1[$i-1]['lat_lon'];
        $u_id = $arr1[$i-1]['u_id'];
        $loc .= "['" . $name . "', " . $lat_lon . ", " . $u_id . "]";
    }
}

?>

<div id="map" style="width: 100%; height: 100%;"></div>

<script>
    
    var xmap = document.getElementById("map");
    
    getLocation();
    
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
            $("#notis1").html(".. Finding your location, please wait ..").addClass("alert-info p_hack");
        } else {
            xmap.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function showPosition(position) {
        setOtherLocation(position.coords.latitude, position.coords.longitude);
    }
    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                xmap.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                xmap.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                xmap.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                xmap.innerHTML = "An unknown error occurred."
                break;
        }
    }
    
    function setOtherLocation(posX, posY) {
        var numLoc = <?=$num; ?>;
        var locations = [<?=$loc; ?>];
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: new google.maps.LatLng(posX, posY),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
        $("#notis1").html("").removeClass("alert-info p_hack");
        
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            if (i < numLoc) {
                // location
                marker.setIcon("http://maps.google.com/mapfiles/ms/icons/green-dot.png");
            } else {
                // driver
                marker.setIcon("http://maps.google.com/mapfiles/ms/icons/blue-dot.png");
            }
            google.maps.event.addListener(marker, "click", (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
        
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(posX, posY),
            map: map
        });
        marker.setIcon("http://maps.google.com/mapfiles/ms/icons/yellow-dot.png");
        // self location
        google.maps.event.addListener(marker, "click", (function (marker, i) {
            return function () {
                infowindow.setContent("I'm here!");
                infowindow.open(map, marker);
            }
        })(marker, locations.length));
    }
</script>