<html>
<br></br>
<input type="button" value="選擇柵欄" onClick="location.href='FenceInquire.php';">

</html>
<!DOCTYPE html>
<input id="name">Please input Fence Name First !!!</input>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
            <meta charset="utf-8">
                <title>Polygon arrays</title>
                <style>
                    html, body {
                        height: 97%;
						width:100%;
                        margin: 0;
                        padding: 0;
                    }
                #map {
                    height: 97%;
					width:100%;
                }
                </style>
                </head>
    <body>
        <div id="map"></div>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript">
            var mypoly;
            var map;

            
            function initialize()
            {
                map = new google.maps.Map(document.getElementById('map'),
                                          {
                                          zoom: 8,//起始地圖比例大小
                                          center: new google.maps.LatLng(24.14174098050432,120.67588806152344),//起始位置
                                          mapTypeId: google.maps.MapTypeId.ROADMAP
                                          });
                                          
                                          
                                          
                                          
                                          mypoly = new google.maps.Polygon(
                                                                           {
                                                                           strokeColor: '#000000',
                                                                           strokeOpacity: 0.8,
                                                                           strokeWeight: 2,
                                                                           fillColor: "#000000",
                                                                           fillOpacity: 0.26
                                                                           });
                                                                           mypoly.setMap(map);
                                                                           
                                                                           
                                                                           google.maps.event.addListener(map, 'click', addLatLng);
                                                                           
                                                                           
                                                                           google.maps.event.addListener(map, 'rightclick', testlocation);
                                                                           
                                                                           infoWindow = new google.maps.InfoWindow;
                                                                           
            }
        
        function addLatLng(event)
        {
            var mypath = mypoly.getPath();
            mypath.push(event.latLng);
            
            
            
            var marker1 = new google.maps.Marker(
                                                 {
                                                 
                                                 position: event.latLng,
                                                 title: '#' + mypath.getLength(),
                                                 map: map
                                                 });
                                                 
        }

        function testlocation (event)
        {
            var fvalue = document.getElementById("name").value;//接收NAME值

           
		   
            var vertices = mypoly.getPath();
            var resultColor;
           
            if (google.maps.geometry.poly.containsLocation(event.latLng, mypoly))
            {
                resultColor ='green';
                
                
            }else{
                
                resultColor ='red';
                
            }
//----------將經緯度寫入迴圈-------------------------------------------------------------------------------             			
            var xylocation_lat = [];
            var x_lat =[];

			var xylocation_lng = [];
            var x_lng =[];
            
            var contentString = '<b>My Polygon</b><br>' +
            'Clicked location: <br>'
            '<br>';            
    
                // Iterate over the vertices.
  
            for (var i =0; i < vertices.getLength(); i++) {
                xylocation_lat[i] = vertices.getAt(i);
                x_lat[i] = xylocation_lat[i].lat();							
                contentString += '<br>' + 'Coordinate_lat ' + i+ + ':<br>' + xylocation_lat[i].lat(); ;
            }
			for (var i =0; i < vertices.getLength(); i++) {
				xylocation_lng[i] = vertices.getAt(i);
                x_lng[i] = xylocation_lng[i].lng();					
                contentString += '<br>' + 'Coordinate_lng ' + i+ + ':<br>' +xylocation_lng[i].lng(); ;
            }
			
//-----------------------------------------------------------------------------------------------------------		
			
//---------------判別是否輸入柵欄名稱----------------------------			
		
if(fvalue.match(/[a-z]/i) ){ 
alert('成功輸入柵欄:'+fvalue); 
}else{ 
alert('請輸入柵欄名稱'); 
} 
		
		  
//---------------------------------
		
			
            infoWindow.open(map);//開啟地圖
			
			
//---------以ajax傳送POST到newfence.php-----------------------
					
              for (var i =0; i < vertices.getLength(); i++) {             
				$.ajax({
                   type: "POST",
                   url: 'vertex_points1.php',
                   data: {
				  id2:i,   
                  x_lat: x_lat[i],
				  x_lng: x_lng[i],
                    
				    },
                    });
			  } 
			  
			$.ajax({
                   type: "POST",
                   url: 'newfence.php',
                   data: {
			
                       fn:fvalue,
					 
				    },
                    });
			
			
 
//-------------------------------------------------------       
        }
            </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7aEnwKGkOT5yHjjnzikx67s9IAYHBtxg&signed_in=true&callback=initMap"
            async defer></script>


        
        <body onload="initialize()">

        </body>


</html>

