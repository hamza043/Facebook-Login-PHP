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
    </style>
<body>
  <!-- <header class="bg-primary text-white text-center py-3">
        <div class="container">
            <h1>Facebook</h1>
        </div>
  </header> -->
  <?php
session_start();
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
      <div class="col-md-2">
          <div class="profile-container  p-4 bg-light mt-4">
              <img src="./images/Profile pic.jpg" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 140px;">
              <h2 class="mt-3">' . $userData["user_name"] . '</h2>
              <p><strong>Contact: </strong>' . $userData["user_contact"] . '</p>
              <p><strong>Gender: </strong>' . $userData["user_gender"] . '</p>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card mt-4">
              <img src="./images/pokemon1.jpg" class="card-img-top" alt="image">
              <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
              </div>
          </div>
      </div>
      <div class="card col-md-6 mt-4">
          <img src="./images/Pokemon2.jpg" class="card-img-top" alt="image">
          <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
          </div>
      </div>
  </div>
</div>

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


    
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>