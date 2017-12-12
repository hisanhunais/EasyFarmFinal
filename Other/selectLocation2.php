<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
          #map{ width:700px; height: 500px; }
        </style>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRM5CCp0gytfOJaxkwmqxDmyy6-FPPIws"></script>
        <title>Save Marker Example</title>
    </head>
    <body>
        <h1>Select a location!</h1>
        <p>Click on a location on the map to select it. Drag the marker to change location.</p>
        
        <!--map div-->
        <div id="map"></div>
        
        <!--our form-->
        <h2>Chosen Location</h2>
        <form method="post">
            <input type="text" id="lat" readonly="yes"><br>
            <input type="text" id="lng" readonly="yes">
        </form>
        
        <script type="text/javascript" src="map.js"></script>
    </body>
</html>