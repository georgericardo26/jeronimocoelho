//AIzaSyDHQQJXaGAMJgvpXBFM_Hcv_1-Geg0o1UE
/*var myCenter=new google.maps.LatLng(-3.742405, -38.513015);

function initMap()
{
    var mapProp = {
        center:myCenter,
        zoom:14,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker=new google.maps.Marker({
        position:myCenter,
        icon:'imagens/pointer.png'
    });

    marker.setMap(map);
}*/



//google.maps.event.addDomListener(window, 'load', initialize);
//-3.742223, -38.513197
function initMap() {
    // The location of Uluru
    var uluru = {lat: -3.742223, lng: -38.513197};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 15, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
}