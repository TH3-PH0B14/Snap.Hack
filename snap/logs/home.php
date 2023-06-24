<?php
session_start();

// Check if user is not logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("Location: index.php");
    exit;
}

// Logout logic
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snap.Logs</title>
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="fav.png" type="image/png" />
</head>
<body>

    <div id="main">
        <h1>Snap Logs:</h1>
        <hr>

    <div id="logDiv">
        <?php
            $logContents = file_get_contents('log.php');
            echo $logContents;
        ?>
    </div>
    </div>

    <div class="but">
        <button onclick="clearLogFile()">Clear Logs</button>

        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="logout" value="true">
            <button type="submit">Logout</button>
        </form>
    </div>

    <h3 class="by">❤️ Made by: Not3 & PH0B14</h3>

    <script>
        // Function to refresh the div content
        function refreshDiv() {
            var logDiv = document.getElementById('logDiv');

            // Make an AJAX request to fetch the updated content
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                logDiv.innerHTML = this.responseText;
            }
            };
            xhttp.open('GET', 'log.php', true);
            xhttp.send();
        }

        // Refresh the div every 5 seconds (5000 milliseconds)
        setInterval(refreshDiv, 5000);

        // Function to clear the log file
        function clearLogFile() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    refreshDiv(); // Refresh the log display after clearing the file
                }
            };
            xmlhttp.open("POST", "clearlog.php", true); // PHP script to handle clearing the file
            xmlhttp.send();
        }
    </script>
</body>
</html>