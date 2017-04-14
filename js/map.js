/* Map Js File */
function initMap() {
    var myLatlng = {lat: 20.5937, lng: 78.9629 };
    var map = new google.maps.Map(document.getElementById('map'), {
    minZoom:2,
      maxZoom:15,
      zoom: 4,
      center: myLatlng
    });

    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Click to zoom'
    });

    map.addListener('center_changed', function() {
      // 3 seconds after the center of the map has changed, pan back to the
      // marker.
      window.setTimeout(function() {
        map.panTo(marker.getPosition());
      }, 3000);
    });

    marker.addListener('click', function() {
      map.setZoom(8);
      map.setCenter(marker.getPosition());
    });
}