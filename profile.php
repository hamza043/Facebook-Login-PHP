<?php
// include ("function.php");
// if(isset($_SESSION["user_email"]) && isset($_SESSION['user'])) {
//   $user_email = $_SESSION["user_email"];
//   // $user = $_SESSION['user'];
//   $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_email ='$user_email'"));
// }

// else{
//   echo $user;
// }
session_start();
if(isset($_SESSION["login"]) && $_SESSION["login"] === true && isset($_SESSION["user_data"])) {
  $userData = json_decode($_SESSION["user_data"], true);

  // Check karein ke keys exist karte hain aur empty nahi hain
  if(isset($userData["user_name"]) && isset($userData["user_contact"]) && isset($userData["user_gender"])) {
      echo "Welcome, " . $userData["user_name"];
      echo "<br>Contact: " . $userData["user_contact"];
      echo "<br>Gender: " . $userData["user_gender"];
  } else {
      echo "User data is incomplete or empty.";
  }
} else {
  echo "User is not logged in.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
</head>
<body>
  <!-- <h1>Welcome  -->
    <?php 
    // echo $user["user_name"] ."<br>" . $user["user_contact"] ."<br>" . $user["user_gender"];
   
    ?>
  <!-- </h1> -->
  <a href="index.php"><button>Logout</button></a>
  
</body>
</html>