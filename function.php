<?php
session_start();
include("connection.php");

if(isset($_POST['user_email']) && isset($_POST['user_password']) && isset($_POST['call_key']) && $_POST['call_key'] == 'Login') {
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

if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_contact']) && isset($_POST['user_gender']) && isset($_POST['user_password']) && isset($_POST['call_key']) && $_POST['call_key'] == 'Signup') {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $contact = $_POST['user_contact'];
    $gender = $_POST['user_gender'];
    $password = $_POST['user_password'];
    registerUser($name, $email, $contact, $gender, $password);
}

function registerUser($name, $email, $contact, $gender, $password) {
    global $conn; // $conn ko global scope mein lekar ana zaroori hai
    $sqlQuery = "INSERT INTO users_tbl (user_name, user_email, user_contact, user_gender, user_password) VALUES ('$name', '$email','$contact', '$gender', '$password')";
    if (mysqli_query($conn, $sqlQuery)) {
        echo 'success';
    } else {
        echo 'error';
    }
}
// =======================================
// connection close karna hai wampp reinstall krna hai design sai karna hai kam bhi proper krna hai
// agar session nhe hai tw profile pe b nahe ai
// =======================================

// // Check if the necessary POST parameters are set
// if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])) {
//     $name = $_POST['user_name'];
//     $email = $_POST['user_email'];
//     $password = $_POST['user_password'];
//     // Call function with prepared statement parameters
//     registerUser($name, $email, $password);
// }

// // Function to register user, using prepared statements
// function registerUser($name, $email, $password) {
//     global $conn;
//     // Prepare the SQL query with placeholders
//     $sqlQuery = "INSERT INTO users_tbl (user_name, user_email, user_password) VALUES (?, ?, ?)";
//     $stmt = mysqli_prepare($conn, $sqlQuery);
//     // Bind the values to the prepared statement parameters
//     mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
//     // Execute the prepared statement
//     if (mysqli_stmt_execute($stmt)) {
//         echo 'success';
//     }
//     else {
//         echo 'error';
//     }
//     // Close the statement
//     mysqli_stmt_close($stmt);
// }

// session_start();
// include("connection.php");

// if(isset($_POST['user_email']) && isset($_POST['user_password'])) {
//     // User is trying to log in
//     $email = $_POST['user_email'];
//     $password = $_POST['user_password'];
//     login($email, $password);
// }
// elseif(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])) {
//     // User is trying to sign up
//     $name = $_POST['user_name'];
//     $email = $_POST['user_email'];
//     $password = $_POST['user_password'];
//     registerUser($name, $email, $password);
// }
// else {
//     // Invalid request
//     echo 'Invalid request';
// }

// function login($email, $password){
//     global $conn;
//     // Use prepared statement to prevent SQL injection
//     $stmt = $conn->prepare("SELECT * FROM users_tbl WHERE user_email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_assoc();

//     if ($row && password_verify($password, $row["user_password"])) {
//         // User login successful
//         $_SESSION["login"] = true;
//         $_SESSION["user_email"] = $row["user_email"];
//         // Fetch user data from database
//         $userData = array(
//             "user_id" => $row["user_id"],
//             "user_name" => $row["user_name"],
//             "user_contact" => $row["user_contact"],
//             "user_gender" => $row["user_gender"]
//         );
//         // Encode user data as JSON and store it in session
//         $_SESSION["user_data"] = json_encode($userData);
//         echo "login success";
//     } else {
//         // Login failed
//         echo "Invalid email or password";
//     }
//     $stmt->close();
// }

// function registerUser($name, $email, $password) {
//     global $conn;
//     // Use prepared statement to prevent SQL injection
//     $stmt = $conn->prepare("INSERT INTO users_tbl (user_name, user_email, user_password) VALUES (?, ?, ?)");
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//     $stmt->bind_param("sss", $name, $email, $hashedPassword);

//     if ($stmt->execute()) {
//         // Successful registration
//         echo "success";
//     } else {
//         // Registration failed
//         echo "Error: " . mysqli_error($conn);
//     }
//     $stmt->close();
// }

        
?>