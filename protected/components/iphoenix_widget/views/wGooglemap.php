<!--<div id="<?php echo $id;?>"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4mDeyegTUk8uofDN45BhB6Q_Cd3MEoNU"></script>
    <script>
        var geocoder;
        var map;
        function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(-34.397, 150.644);
          var mapOptions = {
            zoom: 8,
            center: latlng
          }
          map = new google.maps.Map(document.getElementById('<?php echo $id?>'), mapOptions);
        }

        function codeAddress() {
          var address = '<?php echo $address;?>';
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location
              });
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
          });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
//        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//                infoWindow.setPosition(pos);
//                infoWindow.setContent(browserHasGeolocation ?
//                                      'Error: The Geolocation service failed.' :
//                                      'Error: Your browser doesn\'t support geolocation.');
//                infoWindow.open(map);
//        }
    </script>-->
    
<iframe
    width="600"
    height="450"
    frameborder="0" style="border:0"
    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA4mDeyegTUk8uofDN45BhB6Q_Cd3MEoNU
    &q=thai+thinh+ha+noi+viet+nam" allowfullscreen>
</iframe>