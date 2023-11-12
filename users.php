<?php
session_start();

if (isset($_SESSION['user_data'])) {
    $userData = json_decode($_SESSION['user_data'], true); // Decode JSON to array
} else {
    // Redirect user to login page if session data is not available
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="icon" type="image/x-icon" href="./images/fbfavicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>
  
</head>
<body class="container">
    <h2 class="text-center bg-info">User Data</h2>
    <?php
    if (!empty($userData) && is_array($userData)) {
        echo '<table class="table table-bordered table-striped mt-4">';
        echo '<thead class="thead-dark"><tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>Education</th><th>City</th><th>Contact</th><th>Address</th><th>Gender</th></tr></thead>';
        
        echo "<tr>";
        echo "<td>{$userData['user_id']}</td>";
        echo "<td>{$userData['user_name']}</td>";
        echo isset($userData['user_email']) ? "<td>{$userData['user_email']}</td>" : "<td></td>"; // Check if the key exists
        echo isset($userData['user_age']) ? "<td>{$userData['user_age']}</td>" : "<td></td>";
        echo isset($userData['user_education']) ? "<td>{$userData['user_education']}</td>" : "<td></td>";
        echo isset($userData['user_city']) ? "<td>{$userData['user_city']}</td>" : "<td></td>";
        echo "<td>{$userData['user_contact']}</td>";
        echo isset($userData['user_address']) ? "<td>{$userData['user_address']}</td>" : "<td></td>";
        echo "<td>{$userData['user_gender']}</td>";
        echo "</tr>";
        
        echo '</table>';
    } else {
        echo '<p class="mt-4">No user data available.</p>';
    }
    ?>
 <div id="map" style="height: 400px; margin-top: 20px;"></div>

<script>
   google.charts.load('current', {
        'packages': ['geochart'],
        'mapsApiKey': 'YOUR_ACTUAL_API_KEY'
    });
    google.charts.setOnLoadCallback(drawMap);

    function drawMap() {
        var data = google.visualization.arrayToDataTable([
            ['City'],
            ['<?php echo isset($userData['user_city']) ? $userData['user_city'] : ''; ?>']
        ]);

        var options = {
            region: 'world',
            displayMode: 'markers',
            colorAxis: {colors: ['red', 'orange', 'yellow', 'green']}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('map'));

        chart.draw(data, options);
    }
</script>    
</body>
</html>