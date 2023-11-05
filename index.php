<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facebook – log in or sign up</title>
  <link rel="icon" type="image/x-icon" href="./images/fbfavicon.png">
  <link rel="stylesheet" href="style.css">
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
                <span id="flashMessage" class="text-danger"></span>
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
              </div>
            </form>
              <div class="d-flex justify-content-center mt-3">
                <button id="createAccountButton" class="btn btn-block text-light mx-auto"
                 style="font-weight: bolder; width: 60%; height: 50px; background-color: #42b72a;">Create new account
                </button>
              </div>
          </div>
        </div>
        <p class="text-center mt-4" style="font-size: 90%;"><a href="#" style="text-decoration: none; color: black;font-weight: 600;">Create a Page</a> for a celebrity, brand or
          business.</p>
      </div>
    </div>
  </div>

<!-- Modal Form Structure -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Sign Up</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signupForm">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="signupName" name="signupName" placeholder="Full Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" id="contact" name="contact" placeholder="Contact Number" required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>

  
  <!-- <footer class="bg-primary text-center text-white fixed-bottom">
    <div class="container p-4 pb-0">
      <section class="mb-4">
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
  </footer> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../Ajax Assigment/Jquery/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $("#loginForm").submit(function(e) {
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        $.ajax({
          type: "POST",
          url: "function.php",  
          data: {
            user_email: email,
            user_password: password
          },
          success: function(response) {
            if (response == "Invalid email or password") {
              $("#flashMessage").text("Invalid email or password.").addClass("error-message");
            } else if (response == "login success") {
              window.location.href = "profile.php";
            }
          },
          error: function(error) {
            console.log('error', error);
          }
        });
      });
    });

    var createAccountButton = document.getElementById("createAccountButton");

// Modal ko select karein
var signupModal = new bootstrap.Modal(document.getElementById('signupModal'));

// Button pe click hone par modal ko dikhayein
createAccountButton.addEventListener('click', function() {
  signupModal.show();
});

$(document).ready(function() {
  $("#signupForm").submit(function(e) {
    e.preventDefault();
    var name = $("#signupName").val();
    var email = $("#signupEmail").val();
    var contact = $("#contact").val();
    var gender = $("#gender").val();
    var password = $("#signupPassword").val();
    
    $.ajax({
      type: "POST",
      url: "function.php", // Server-side script ka URL
      data: {
        user_name: name,
        user_email: email,
        user_contact: contact,
        user_gender: gender,
        user_password: password
      },  
      success: function(response) {
        if (response == "success") {
          alert("Signup successful!");
          signupModal.hide(); 
        } else {
          alert("Signup failed. Please try again.");
          }
      },
        error: function(error) {
          console.log('error', error);
        }
    });
  });
});

  </script>
</body>

</html>