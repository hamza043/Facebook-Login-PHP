<?php
session_start();
include("connection.php");
if(isset($_POST['user_email']) && isset($_POST['user_password'])) {
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];
        
        login($email, $password);
}
function login($email, $password){
    global $conn;
    $user = mysqli_query($conn, "SELECT * FROM users_tbl WHERE user_email = '$email'");
    $row = mysqli_fetch_assoc($user);

    if ($row && $password == $row["user_password"]) {
        // User login successful
        $_SESSION["login"] = true;
        $_SESSION["user_email"] = $row["user_email"];
        // Fetch user data from database
        $userData = array(
            "user_id" => $row["user_id"],
            "user_name" => $row["user_name"],
            "user_contact" => $row["user_contact"],
            "user_gender" => $row["user_gender"]
        );
        // Encode user data as JSON and store it in session
        $_SESSION["user_data"] = json_encode($userData);
        echo "login success";
    } else {
        // Login failed
        echo "Invalid email or password";
    }
}
?>