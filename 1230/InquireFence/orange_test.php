<?php
    
	    
  $select = $_POST['select'];
    //echo $select;
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    // 連結資料庫
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
   $sql = "SELECT * FROM `$select`";
	//	$sql = "SELECT * FROM `save_googlemap`";
    //echo $sql;
    
    $res = $conn->query($sql);
    $lat_array = array();
    $lng_array = array();
    $emparray = array();
	
    while($row=$res->fetch_array())
    {
        
    $emparray[] = array ('lat'=>(float)$row[1],'lng'=>(float)$row[2]);
       // $emparray[] = array ((float)$row[1],(float)$row[2]);
    }
    
	echo json_encode($emparray);
    //echo count($lng_array);
    


		


/////////$m = new GoogleBoard();
//echo $_POST['variable'].'</br>';  //將傳送進來的字元轉成ascii碼
/*
$data = json_decode(stripslashes($_POST['data']));
  // here i would like use foreach:

  foreach($data as $d){
     echo $d;
  }*/
?>
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
  <body>
    <div id="map"></div>
    <script>

// This example creates a simple polygon representing the Bermuda Triangle.

function initMap() {
	
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: {lat: 24.14174098050432, lng: 120.67588806152344},
    mapTypeId: google.maps.MapTypeId.TERRAIN
  });

  // Define the LatLng coordinates for the polygon's path.
      var arr = <?php echo json_encode($emparray); ?>;

//alert(JSON.stringify(arr));
	
    
 // var triangleCoords = arr;

  

  // Construct the polygon.
  var bermudaTriangle = new google.maps.Polygon({
    paths: arr,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillOpacity: 0.35
  });
  bermudaTriangle.setMap(map);
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbhSGvXMVhSpZcjz7suwjASEbYz_YcIH8&signed_in=true&callback=initMap"></script>
  </body>
</html>

