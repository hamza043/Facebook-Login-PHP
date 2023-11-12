<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="icon" type="image/x-icon" href="./images/fbfavicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>
</head>
 <style>
        body {
            background-color: #f2f2f2;
            padding-top: 50px;
        }

        .profile-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
        }

        .logout-btn {
            margin-top: 20px;
        }

        .navbar {
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .content {
        margin-top: 80px; /* Adjust this margin to match the height of your fixed header */
    }
    </style>
<body>
  <!-- <header class="bg-primary text-white text-center py-3">
        <div class="container">
            <h1>Facebook</h1>
        </div>
  </header> -->
  <?php
session_start();
if(!isset($_SESSION['user_email'])){
  echo "<script type='text/javascript'>alert('Please login first.'); window.location = 'index.php';</script>";
}else{
}
$pieChartData = [
  ['Task', 'Hours per Day'],
  ['Work', 11],
  ['Eat', 2],
  ['Commute', 2],
  ['Watch TV', 2],
  ['Sleep', 7]
];
if(isset($_SESSION["login"]) && $_SESSION["login"] === true && isset($_SESSION["user_data"])) {
  $userData = json_decode($_SESSION["user_data"], true);
  if(isset($userData["user_name"]) && isset($userData["user_contact"]) && isset($userData["user_gender"])) {
    echo '<nav class="navbar navbar-light bg-primary text-light">
    <div class="container">
        <a class="navbar-brand text-light" href="#">Facebook</a>
        <a class="nav-link" href="logout.php">Logout</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
          <div class="profile-container p-4 bg-light mt-4 text-center">
            <img src="./images/Profile pic.jpg" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 140px;">
            <a href="users.php" style="text-decoration: none; color: #333; transition: color 0.3s;"> <!-- Add styling to the anchor tag -->
              <h2 class="mt-3" style="cursor: pointer;"  title="More details.">' . $userData["user_name"] . '</h2>
            </a>
            <p><strong>Contact: </strong>' . $userData["user_contact"] . '</p>
            <p><strong>Gender: </strong>' . $userData["user_gender"] . '</p>
          </div>
        </div>

        <div class="col-md-6">
            <div class="card mt-4">
                <img src="./images/pokemon1.jpg" class="card-img-top" alt="image">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>
            </div><br>

            <div id="pieChart" style="height: 300px;"></div><br>
            <div id="LineChart"  style="height: 300px;"></div><br>
            <div id="BarChart" style="height: 300px;"></div>
        </div>

        <div class="card col-md-3 mt-4">
            <img src="./images/Pokemon2.jpg" class="card-img-top" alt="image">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
            </div>
        </div>
    </div>
</div><br>

<footer class="bg-primary text-center text-white">
    <div class="container p-4">
        <section>
            <a class="btn btn-outline-light btn-floating m-1" href="index.php" role="button"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://twitter.com/" role="button"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://mail.google.com/" role="button"><i class="fab fa-google"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.instagram.com/" role="button"><i class="fab fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.linkedin.com/home" role="button"><i class="fab fa-linkedin-in"></i></a>
            <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://github.com/hamza043" role="button"><i class="fab fa-github"></i></a>
        </section>
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="index.php">Facebook</a>
    </div>
</footer>';
  }
}
?>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
    // Draw the pie chart
    let pieData = google.visualization.arrayToDataTable(<?php echo json_encode($pieChartData); ?>);
    let pieOptions = {
        title: 'My Daily Activities',
        is3D: true,
        chartArea: {width: '80%', height: '80%'}
    };
    let pieChart = new google.visualization.PieChart(document.getElementById('pieChart'));
    pieChart.draw(pieData, pieOptions);

    // You can similarly draw other types of charts (line chart, bar chart, etc.) here

// Set Data
const data = google.visualization.arrayToDataTable([
  ['Price', 'Size'],
  [50,7],[60,8],[70,8],[80,9],[90,9],
  [100,9],[110,10],[120,11],
  [130,14],[140,14],[150,15]
]);

// Set Options
const options = {
  title: 'House Prices vs. Size',
  hAxis: {title: 'Square Meters'},
  vAxis: {title: 'Price in Millions'},
  legend: 'none'
};

// Draw
const chart = new google.visualization.LineChart(document.getElementById('LineChart'));
chart.draw(data, options);

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
const data = google.visualization.arrayToDataTable([
  ['Contry', 'Mhl'],
  ['Italy',55],
  ['France',49],
  ['Spain',44],
  ['USA',24],
  ['Argentina',15]
]);

const options = {
  title:'World Wide Wine Production'
};

const chart = new google.visualization.BarChart(document.getElementById('BarChart'));
  chart.draw(data, options);
}

}
</script>

    
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>