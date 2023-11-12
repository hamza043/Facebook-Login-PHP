<?php
session_start();

if(isset($_SESSION['user_data'])) {
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
    <h2 class="text-center bg-info" >User Data</h2>
    <?php
    if (!empty($userData) && is_array($userData)) {
        echo '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
        echo '<tr style="background-color: #f2f2f2; text-align: left;"><th>ID</th><th>Name</th><th>Contact</th><th>Gender</th></tr>';
        
        echo "<tr style=\"border-bottom: 1px solid #ddd;\">";
        echo "<td style=\"padding: 8px;\">{$userData['user_id']}</td>";
        echo "<td style=\"padding: 8px;\">{$userData['user_name']}</td>";
        echo "<td style=\"padding: 8px;\">{$userData['user_contact']}</td>";
        echo "<td style=\"padding: 8px;\">{$userData['user_gender']}</td>";
        echo "</tr>";
        
        echo '</table>';
    } else {
        echo '<p>No user data available.</p>';
    }
    ?>
</body>
</html>