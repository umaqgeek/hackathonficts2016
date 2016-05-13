<div id="map" style="width: 100%; height: 100%;"></div>

<script type="text/javascript">
    
    var xmap = document.getElementById('map');
    getLocation();
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
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
        var numLoc = 2;
        var locations = [['A', 2.289340, 102.304307, 1], ['B', 2.279340, 102.304307, 2]];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: new google.maps.LatLng(posX, posY),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            if (i < numLoc) {
                // location
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
            } else {
                // driver
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
            }
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
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
        marker.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png');
        // self location
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent("I'm here!");
                infowindow.open(map, marker);
            }
        })(marker, locations.length));
    }
</script>