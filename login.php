<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    // Validate and sanitize input
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to retrieve user information
    $sql = "SELECT * FROM users WHERE user_name='$uname'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Error in SQL query
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify password
        if (password_verify($pass, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            #header("Location: home.php"); // Redirect to home page
            exit();
        } else {
            // Incorrect password
            #header("Location: index.php?error=Incorrect password");
            exit();
        }
    } else {
        // No user found
        #header("Location: index.php?error=User not found");
        exit();
    }
} else {
    // Redirect to the login page if the login form was not submitted
    #header("Location: index.php");
    exit();
}
?>
