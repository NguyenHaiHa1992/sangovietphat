<div id="<?php echo $id;?>"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA78XuWkWfMAWYdi3A5DGFLPAjmzpFl3JU"></script>
<script>
   /*BEGIN MAP*/
var geocoder;
var map;
var infowindow;
function map_initialize(){
    geocoder=new google.maps.Geocoder();

    var mapOptions={
        zoom    : <?php echo $zoom;?>,
        center  : new google.maps.LatLng(<?php echo $toadoX;?>,<?php echo $toadoY;?>),
    };
    
    map = new google.maps.Map(document.getElementById('<?php echo $id?>'),mapOptions);
    
    var marker = new google.maps.Marker({
        map:map,
        position:map.getCenter(),
        title:'Sango VietPhat',
    });

    var infowindow = new google.maps.InfoWindow({
        "content"       : "San go Viet Phat",
    });
    infowindow.open(map,marker);
}
function codeAddress(){
    geocoder.geocode(
            {'address':<?php echo $address;?>},
            function(results,status){
                if(status==google.maps.GeocoderStatus.OK){
                    map.setCenter(results[0].geometry.location);
                    var marker=new google.maps.Marker({map:map,position:results[0].geometry.location});
                }else{
                    alert('Geocode was not successful for the following reason: '+status);
                }
            }
    );
}
/*END MAP*/
</script>

<script type="text/javascript">
    map_initialize();
</script>
    