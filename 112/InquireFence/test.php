<?php
session_start();

$test=$_SESSION['temp'];
echo "你所選的柵欄經緯度", $test;

?>
<html>
<input type="button" value="返回選擇柵欄" onClick="location.href='FenceInquire.php';">

</html>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple Polygon</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  
  <body >
  
    <div id="map"></div>
    <script>

// This example creates a simple polygon representing the Bermuda Triangle.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
     center: {lat: 24.14174098050432, lng: 120.67588806152344},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

 var triangleCoords = [
 {"lat":24.3008,"lng":120.596},
 {"lat":24.3283,"lng":120.715},
 {"lat":24.153,"lng":120.509}
 ];
 
/*var triangleCoords=<?php echo json_encode($emparray); ?>;*/

var triangleCoords=<?php echo($test); ?>;

  // Construct the polygon.
  var bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });
  bermudaTriangle.setMap(map);
}

    </script>
    <script async defer
               src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbhSGvXMVhSpZcjz7suwjASEbYz_YcIH8&signed_in=true&callback=initMap"></script>
		     
  </body>


</html>

