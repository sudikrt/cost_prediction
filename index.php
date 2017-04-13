<?php
require "login/loginheader.php"; 
//Class Autoloader
spl_autoload_register(function ($className) {

    $className = strtolower($className);
    $path = "login/includes/{$className}.php";

    if (file_exists($path)) {

        require_once($path);

    } else {

        die("The file {$className}.php could not be found.");

    }
});
$id = new RetriveData;
?>

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
    <h3>Cost Pro</h3>
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