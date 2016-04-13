<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
    #map_canvas {
      width: 100%;
      min-height: 100%;
    }
    </style>
</head>
<body id="body" style="overflow: hidden; margin: 0px auto; padding: 0px;">
  <div id="map_canvas" class="mapping"></div>
  <script>
  
  document.getElementById("body").style.height = <?php echo isset($_GET['height']) ? $_GET['height'] : 'screen.height'; ?> +'px';
  var geocoder;
  var map;
  var markersArray = [];
  var locationsArray = <?php echo json_encode($_GET['q']); ?>;
  var infoWindow ;
   
    function initialize() 
    {
      geocoder = new google.maps.Geocoder();
      var infoWindow = new google.maps.InfoWindow(), marker, i;
      var bounds = new google.maps.LatLngBounds();
    
      latlang = geocoder.geocode( { 
         'address': locationsArray[0] },                                             
        function(results, status) 
        {  
          if (status == google.maps.GeocoderStatus.OK) 
          {
            map.setCenter(results[0].geometry.location);
            marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
            markersArray.push(marker);
          }
           else
          {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });

      var myOptions = 
        {
          center: latlang, zoom: 5, 
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          navigationControlOptions: 
            {
              style: google.maps.NavigationControlStyle.SMALL
            }
        };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      plotMarkers();

      function plotMarkers(){
        for(var i = 0; i < locationsArray.length; i++){
          codeAddresses(locationsArray[i], i);
        }
      }
      
      function codeAddresses(address, i){
         
         geocoder.geocode( { 'address': address}, function(results, status) { 
           if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            bounds.extend(results[0].geometry.location);
            marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
        
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                infoWindow.setContent(address);
                infoWindow.open(map, marker);
              }
            })(marker, i));
          
            map.fitBounds(bounds);
            //markersArray.push(marker); 
          }
          else{
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
      }

    }
      //geocoder.maps.event.addDomListener(window, 'load', initialize);

  </script>
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize" ></script>
</body>
</html>