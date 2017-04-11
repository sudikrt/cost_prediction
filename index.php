

<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 20.5937, lng: 78.9629 };
        var map = new google.maps.Map(document.getElementById('map'), {
		  minZoom:2,
		  maxZoom:15,
		  zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEYuHzsHGqcz4jqaf_KvaqDljdpxR7Vqs&callback=initMap">
    </script>
  </body>
</html>