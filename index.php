<?php
// include ("function.php");

// if(isset($_POST['user_email']) && isset($_POST['user_password'])) {
//   $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
//   $user_password = $_POST['user_password'];

//   $user_query = mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_email = '$user_email'");

//   if(mysqli_num_rows($user_query) > 0) {
//     $row = mysqli_fetch_assoc($user_query);
//     if($user_password == $row["user_password"]) {
//       $_SESSION["user_id"] = $row["user_id"];
//       header("Location: profile.php");
//       exit();
//     } else {
//       echo "Wrong Password";
//     }
//   } else {
//     echo "User Not Registered";
//   }
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook – log in or sign up</title>
  <link rel="icon" type="image/x-icon" href="./images/fbfavicon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
  <header></header>

  <div class="container">
    <div class="row">
      <div class="col-md-6" style="margin-top: 180px; margin-left: 50px; padding-right: 20px;">
        <img src="https://static.xx.fbcdn.net/rsrc.php/yI/r/4aAhOWlwaXf.svg" style="width: 50%;margin-left: 70px;"
          alt="Facebook">
        <p style="font-family:SFProDisplay-Regular, Helvetica, Arial, sans-serif;font-size: 28px;font-weight: normal;line-height: 32px;width: 500px; margin-left: 100px;">Facebook helps you connect
          and share with the people in your life.</p>
      </div>
      <div class="col-md-6 col-lg-4" style="margin-right: 100px; margin-top: 150px;">
        <div class="card">
          <div class="card-body">

            <form id="loginForm">
              <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address or phone number"
                  value="muhammadhamza@gmail.com">
              </div>
              <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="123">
              </div>
              <button type="submit" class="btn btn-primary btn-block"
                style="font-weight:bolder; width: 100%;height: 50px;font-size: larger;">Log in</button>
              <div class="text-center mt-3">
                <a href="#" style="text-decoration: none; font-size: smaller; font-weight:600;">Forgotten password?</a>
                <hr>
                <button type="submit" class="btn btn-block text-light"
                  style="font-weight:bolder; width: 60%; height: 50px; background-color: #42b72a;">Create new
                  account</button>
              </div>
            </form>
          </div>
        </div>
        <p class="text-center mt-4" style="font-size: 90%;"><a href="#" style="text-decoration: none; color: black;font-weight: 600;">Create a Page</a> for a celebrity, brand or
          business.</p>
      </div>
    </div>
  </div>

  <!-- <footer class="bg-primary text-center text-white fixed-bottom">
    <div class="container p-4 pb-0">
      <section class="mb-4">
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
  </footer> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../Ajax Assigment/Jquery/jquery.js"></script>
<script>
$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();

        // console.log('email', email, 'password', password);
        // return;

        $.ajax({
            type: "POST",
            url: "function.php",  
            data: {
              user_email: email,
              user_password: password
            },
            success: function(response) {
                
                console.log(response + "kch b");
                // return;
                if(response == "Your are logged in"){
                console.log(response + "andr hun");

                  // window.location.href = "profile.php";
                }
            },
            error: function(error) {
                console.log('error', error);
            }
        });
    });
});



//   $(document).ready(function() {
//     $("#loginForm").submit(function(e) {
//         e.preventDefault();
//         var email = $("#email").val();
//         var password = $("#password").val();
        

//         // AJAX request bhejein
//         $.ajax({
//             type: "POST",
//             url: "login.php",
//             data: {
//                 email: email,
//                 password: password
//             },
//             success: function(response) {
//                 if(response == "Success") {
//                     // User login successful, redirect to another page
//                     window.location.href = "profile.html";
//                 } else {
//                     // Show error message to user
//                     alert("Invalid email or password. Please try again.");
//                 }
//             },
//             error: function(error) {
//                 console.log(error);
//             }
//         });
//     });
// });
</script>
</body>

</html>