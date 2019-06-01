<!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Smart Guide</title>
          <style>
            #map{
              height:500px;
              width:750px;
            }
          </style>
        </head>
        <body>
          <h1>My Google Map</h1>
          <div id="map"></div>
          <script>
            function initMap(){
              // Map options
              var options = {
                zoom:12,
                center:{lat:40.355048,lng:-79.835499}
              }

              // New map
              var map = new google.maps.Map(document.getElementById('map'), options);
              var directionsService = new google.maps.DirectionsService();
              var directionsDisplay = new google.maps.DirectionsRenderer();
              directionsDisplay.setMap(map);
              var request = {   travelMode: google.maps.TravelMode.DRIVING, optimizeWaypoints: true, waypoints: []  };

              // Listen for click on map
              google.maps.event.addListener(map, 'click', function(event){
                // Add marker
                addMarker({coords:event.latLng});
              });

              // Array of markers
              var markers = [
                
                 {25.4920,81.8639},

                
                
                
                 {25.4299,81.7712},

               
                
                
                {25.4669,81.8594}

               
                
              ];

              // Loop through markers
              for(var i = 0;i < markers.length;i++){
                // Add marker
                addMarker(markers[i]);
              }

              // Add Marker Function
              function addMarker(props){
                var marker = new google.maps.Marker({
                  position:props.coords,
                  map:map,
                  icon:props.iconImage
                });

                // Check for customicon
                if(props.iconImage){
                  // Set icon image
                  marker.setIcon(props.iconImage);
                }

                // Check content
                if(props.content){
                  var infoWindow = new google.maps.InfoWindow({
                    content:props.content
                  });

                  marker.addListener('click', function(){
                    infoWindow.open(map, marker);
                  });
                }     
                if (i === 0) { 
                    request.origin = props.coords; 
                }
                else if (i === markers.length - 1) {
                    request.destination = props.coords;
                    }
                    else {
                        if (props.coords) {
                        request.waypoints.push({
                        location: props.coords,
                        stopover: true
                            })
                        }

                    }
                //End of Add Marker Function
                }
            directionsService.route(request,function(response,status){
                if (status == "OK"){
                    directionsDisplay.setDirections(response)
                }
            })
            }
          </script>
          <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIZsk8SNPVQMm8Tu4TXieZT0xIqkMSECo&callback=initMap">
            </script>
           

        </body>
        </html>