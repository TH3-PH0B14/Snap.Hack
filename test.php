<!DOCTYPE html>
<html>
<head>
    <title>GPS Logging</title>
    <script>
        function logGPS(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Send GPS data to PHP script for logging
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "log_gps.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("latitude=" + latitude + "&longitude=" + longitude);

            // Display success message
            alert("GPS coordinates logged successfully.");
        }

        function logError(error) {
            alert("Error occurred while retrieving GPS data: " + error.message);
        }

        function getGPS() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(logGPS, logError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    </script>
</head>
<body>
    <button onclick="getGPS()">Log GPS Coordinates</button>
</body>
</html>
