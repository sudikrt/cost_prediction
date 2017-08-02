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
?>
<!DOCTYPE html>
<html>
  <head>
    
    <title>Cost Pro</title>
       <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    
      
      <!-- Auto Complete TextView -->
        
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
        
        
        .frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
        #country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
        #country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
        #country-list li:hover{background:#ece3d2;cursor: pointer;}
        #search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
        
        
        
        
        
        
        
        
        
        
         #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
        
        #slider .rs-range-color  {
            background-color: #33B5E5;
        }
        #slider .rs-path-color  {
            background-color: #C2E9F7;
        }
        #slider .rs-handle  {
            background-color: #C2E9F7;
            padding: 7px;
            border: 2px solid #C2E9F7;
        }
        #slider .rs-handle.rs-focus  {
            border-color: #33B5E5;
        }
        #slider .rs-handle:after  {
            border-color: #33B5E5;
            background-color: #33B5E5;
        }
        #slider .rs-border  {
            border-color: transparent;
        }
    </style>
     
       <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
       <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
        <script>
            var rad = 10;
        $(document).ready(function(){
            $("#search-box").keyup(function(){
                $.ajax({
                type: "POST",
                url: "login/getProf.php",
                data:'q='+$(this).val(),
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                }
                });
            });
            
            $("#searchBtn").click(function(){
                $.ajax({
                    type: "POST",
                    url:"login/getDataInMyLoc.php",
                    data: {profDesc: $("#search-box").val(), latitude:$("#latitude").val(), longitude: $("#longitude").val(), radius:rad}
                    }).success(function(data) {
                        setUpMarker (data);

                    }).statusCode ({
                        404 : function () {
                            alert ("Page Not found");
                        }
                    }).error (function (data) {
                        console.log (data);
                    });
            } );
            $("#slider").roundSlider({
                 min: 10,
                max: 100,
                step: 10,
                radius: 80,
                width: 8,
                handleSize: "+16",
                handleShape: "dot",
                sliderType: "min-range",
                value: 10
            });
            
            $("#slider").roundSlider({
                change: "onValueChange"
            });

          
           
        });
            var markers = [];

        
            function setUpMarker (data) {
        
                console.log(data);
                 clearMarkers();


                var dat = JSON.parse(data);
                for (var i=0; i<dat.length; i++) {
                     console.log(dat [i].companyName);
                    pos = {lat: Number (dat [i].latitude), lng: Number(dat[i].longitude)};
                    var marker = new google.maps.Marker({
                      position: pos,
                      map: map,
                      title: dat[i].companyName
                    });
                    markers.push(marker);
                }
              
                 function setMapOnAll(map) {
                    for (var i = 0; i < markers.length; i++) {
                      markers[i].setMap(map);
                    }
                  }

                  // Removes the markers from the map, but keeps them in the array.
                  function clearMarkers() {
                    setMapOnAll(null);
                  }


                
            }
            
            function onValueChange (e) {
                
                rad = e.value;
            }
  
        function selectCountry(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
        }
            
        </script>
  </head>
  <body>
      <div class="container">
          <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <a class="navbar-brand" href="#">Cost Pro</a>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                    
                 <li class="nav-item">
                    <a class="nav-link" href="login/logout.php" class="button button2">Logout</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input id="pac-input" class="controls form-control mr-sm-2" type="text" placeholder="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>
      </div>
      <div class="container">
        <div id="map"></div>      
      </div>
      
      <div class="container">
            
      </div>
            
      <div class="container">
          <form action="" method="post">
                  
            <div class="frmSearch" style="display:block;">
                <div style="margin:0px; padding: 0px; display:inline-block" class="col-md-2">
                    <div class="col-md-2">
                        <input type="text" id="latitude" name="latitude" placeholder="Latitude"/>
                    </div>

                    <br/>
                    <div class="col-md-2">
                        <input type="text" id="longitude" name="longitude" placeholder="Longitude"/>
                    </div>

                    <br/>
                    <div class="col-md-2">
                    <input type="text" id="search-box" placeholder="Company Name" />
                    <div id="suggesstion-box"></div>
                    </div>
                    <br/>
                    <div class="col-md-2">
                    <input type="button" value="Search" id="searchBtn"/>
                    </div>
                </div>
                
                 <script src="https://cdn.jsdelivr.net/jquery/1.11.3/jquery.min.js"></script>
                                    
<link href="https://cdn.jsdelivr.net/jquery.roundslider/1.3/roundslider.min.css" rel="stylesheet" />
                                    
<script src="https://cdn.jsdelivr.net/jquery.roundslider/1.3/roundslider.min.js"></script>
                <div class="col-md-2" style="float:right; display:inline-block"id="slider"></div>
            </div>
      </div>
    
      <div class="container" style="margin-top:200px;">
          <ul>
            <li>
                 <a href = "login/stasticalInput.php">Stastical Data</a> 
            </li>
              
              <li>
                   <a href = "login/profInput.php">Professional Data</a>
              </li>
              
              <li>
                    <a href = "login/experienceInput.php">Experience Data</a>
              </li>
              
              <li>
                 <a href = "login/company_input.php" >Company Data</a>  
            </li>
          </ul>
      </div>
      

    <div id="map"></div>
    <script>
        var map;
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
      map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 20.593684, lng: 78.96288000000004},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));
             /* console.log(String(place.geometry.location.lat()));
              console.log(String(place.geometry.location.lng()));*/
              document.getElementById('latitude').value = String(place.geometry.location.lat().toFixed(8));
              document.getElementById('longitude').value = String(place.geometry.location.lng().toFixed(8));


            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);});
                google.maps.event.addListener(map, 'click', function(event) {
                document.getElementById('latitude').value=parseFloat(event.latLng.lat()).toFixed(8); //event.lat();
                document.getElementById('longitude').value=parseFloat(event.latLng.lng()).toFixed(8);//event.;lng();
        });
          
          
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEYuHzsHGqcz4jqaf_KvaqDljdpxR7Vqs&libraries=places&callback=initAutocomplete"
         async defer></script>
  </body>
</html>