<htm>
    <head>
        <title>Company Data</title>
        <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
        
        <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
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
    </style>

    </head>
    <body>
        
        <center>
              <div class="container">
                   <input id="pac-input" class="controls" type="text" placeholder="Search Box">

                <div id="map"></div>      
            </div>
    
             <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEYuHzsHGqcz4jqaf_KvaqDljdpxR7Vqs&callback=initAutocomplete">
            </script>
            <script src="js/map.js"></script>
            <h1>Company Profile</h1>
            <form method="post" action="insertCompany.php">
                <table>
                    <tr>
                        <td align="center">
                            <input type="text" name="companyName" id="companyName" placeholder="Enter your company name" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="latitude" id="latitude" placeholder="Enter Latitude" required/> 
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="text" name="longitude" id="longitude" placeholder="Enter Longitude" required/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <textarea cols="16" rows="10" id="address" name="address" required placeholder="Tell us where are you located"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="number" name="yearOfExistance" id="yearOfExistance" placeholder="When is yout company started ?" required/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input type="submit" value="Submit"/>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</htm>