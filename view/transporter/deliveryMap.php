 <!DOCTYPE html >
 <title>Transporter</title>
   <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
    <link href="../../css/homepage.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
        width: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head> 

   <body>
    <div id="map"></div>
    <br> 
    <div>
    	<center>
    		<a href = "delivery.php"><input type="button" id="back_btn" value="Back" class="btn btn-success btn-md" /></a>
    	</center>
    </div>

    <?php
    	require '../../dbconfig/config.php';
    	$id = $_GET['id'];

    	$sql1 = "SELECT * FROM ordertable WHERE Ord_No = '$id'";
    	$res = mysqli_query($con,$sql1);
    	$row = mysqli_fetch_assoc($res);

    	$seller = $row["seller_username"];
    	$buyer = $row["buyer_username"];
    ?>

    <script>
      var customLabel = {
        Farmer: {
          label: 'Origin'
        },
        bar: {
          label: 'B'
        }
      };
      var seller1 = "<?php echo $seller; ?>";
        var buyer1 = "<?php echo $buyer; ?>";
        // var seller1 = "KamalPerera";
        // var buyer1 = "nimal";
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(8.311223, 80.41306),
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow;
        
        var url1 = "getMarkers.php?seller="+seller1+"&buyer="+buyer1;
          // Change this depending on the name of your PHP or XML file
          downloadUrl(url1, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              //var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              // var apiurl = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=-33.861,151.172&destinations=-33.8799,151.21&key=AIzaSyCRM5CCp0gytfOJaxkwmqxDmyy6-FPPIws";
              // var result = file_get_contents(apiurl);
              // var someArray = json_decode($result, true);
              // echo $someArray[0];
              // echo $someArray['origin_addresses'][0];
              // echo $someArray['rows'][0]['elements'][0]['duration']['text'];
              // echo $someArray['rows'][0]['elements'][0]['distance']['text'];

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              // infowincontent.appendChild(someArray['origin_addresses'][0]);
              // infowincontent.appendChild(someArray['rows'][0]['elements'][0]['duration']['text']);
              // infowincontent.appendChild(someArray['rows'][0]['elements'][0]['distance']['text']);

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRM5CCp0gytfOJaxkwmqxDmyy6-FPPIws&callback=initMap">
    </script>
   </body>
</html> 