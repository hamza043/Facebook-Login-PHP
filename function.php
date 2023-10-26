<?php
// echo $_POST['user_email'];
// echo $_POST['user_password'];
// die();
session_start();

include("connection.php");

if(isset($_POST['user_email']) && isset($_POST['user_password'])) {
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        
        login($email, $password);
}
function login($email, $password){
    global $conn;
    // $user_email = $_POST["user_email"];
    // $user_password = $_POST["user_password"];


//     $user = mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_email = '$email'");

//     if(mysqli_num_rows($user) > 0){
//         $row = mysqli_fetch_assoc($user);
//         echo json_encode($row);
//         if($password == $row["user_password"]){
//             echo "Login Success";
//             $_SESSION["login"] = true;
//             $_SESSION["user_email"] = $row["user_email"];
//         }
//         else{
//             echo "Wrong Password";
//             exit;
//         }
//     }
//     else{
//         echo "User Not Registered";
//         exit;
//     }
//  }

    $user = mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_email = '$email'");
    $row = mysqli_fetch_assoc($user);

    if ($row && $password == $row["user_password"]) {
        // User login successful
        // $_SESSION["login"] = true;
        // $_SESSION["user_email"] = $row["user_email"];

        // Fetch user data from database
        $userData = array(
            "user_id" => $row["user_id"],
            "user_name" => $row["user_name"],
            "user_contact" => $row["user_contact"],
            "user_gender" => $row["user_gender"]
            // Add more fields as needed
        );

        // Encode user data as JSON and store it in session
        $_SESSION["user_data"] = json_encode($userData);

        // header("Location: profile.php");
        // exit();
        echo "Your are logged in";

    } else {
        // Login failed
        echo "Invalid email or password";
    }
}
?>