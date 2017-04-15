
<html>
    <head>
    
        <script> 
        
        
            var lat1 = 13.040802;
            var lon1 = 77.580546;
            
            var lat2 = 12.966564;
            var lon2 = 77.726673;
            
         
            
            /*var R = 6371e3; // metres
            var t1 = lat1.toRadians();
            var t2 = lat2.toRadians();
            var dt = (lat2-lat1).toRadians();
            var lt = (lon2-lon1).toRadians();*/
            
           /*    document.write("hi");

            var a = Math.sin(dt/2) * Math.sin(dt/2) +
                    Math.cos(t1) * Math.cos(t2) *
                    Math.sin(lt/2) * Math.sin(lt/2);
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

            var d = R * c;*/
            
            document.write(distance(lat1, lon1, lat2, lon2));
            
            function distance(lat1, lon1, lat2, lon2) {
              var R = 6371; // Radius of the earth in km
              var dLat = (lat2 - lat1) * Math.PI / 180;  // deg2rad below
              var dLon = (lon2 - lon1) * Math.PI / 180;
              var a = 
                 0.5 - Math.cos(dLat)/2 + 
                 Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * 
                 (1 - Math.cos(dLon))/2;

              return R * 2 * Math.asin(Math.sqrt(a));
            }
        </script>
    </head>
    <body></body>
</html>