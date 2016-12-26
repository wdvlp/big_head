<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Polygon Arrays</title>
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
<body>
<div id="map"></div>
<script>

// This example creates a simple polygon representing the Bermuda Triangle.
// When the user clicks on the polygon an info window opens, showing
// information about the polygon's coordinates.

var map;
var infoWindow;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
                              zoom: 5,
                              center: {lat: 24.886, lng: -70.268},
                              mapTypeId: google.maps.MapTypeId.TERRAIN
                              });
    
    // Define the LatLng coordinates for the polygon.
    var triangleCoords = [
    [25.774, -80.190],
    [19.886, -79.143],
    [18.466, -66.118],
    [32.321,-64.757],
    [25.774, -80.190]
    ];
    
    
    var points = [];
    for(var i=0; i<triangleCoords.length; i++) {
        points.push(new google.maps.LatLng(triangleCoords[i][0],
                                           triangleCoords[i][1]));
    }
    // Construct the polygon.
    var bermudaTriangle = new google.maps.Polygon({
                                                  paths: points,
                                                  strokeColor: '#FF0000',
                                                  strokeOpacity: 0.8,
                                                  strokeWeight: 2,
                                                  fillColor: '#FF0000',
                                                  fillOpacity: 0.35
                                                  });
    bermudaTriangle.setMap(map);
    
    
    
    
    
    // Add a listener for the click event.
    bermudaTriangle.addListener('click', showArrays);
    
    infoWindow = new google.maps.InfoWindow;
}

/** @this {google.maps.Polygon} */
function showArrays(event) {
    // Since this polygon has only one path, we can call getPath() to return the
    // MVCArray of LatLngs.
    var vertices = this.getPath();
    
    var contentString = '<b>Bermuda Triangle polygon</b><br>' +
    'Clicked location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +
    '<br>';
    
    // Iterate over the vertices.
    for (var i =0; i < vertices.getLength(); i++) {
        var xy = vertices.getAt(i);
        contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' +
        xy.lng();
    }
    
    // Replace the info window's content and position.
    infoWindow.setContent(contentString);
    infoWindow.setPosition(event.latLng);
    
    infoWindow.open(map);
}

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7aEnwKGkOT5yHjjnzikx67s9IAYHBtxg&signed_in=true&callback=initMap"></script>
</body>
</html>