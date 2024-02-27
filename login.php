<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

    // Your validation and hashing code goes here...

    if (empty($uname) || empty($pass)) {
        header("Location: index.php"); // Redirect to the login page without query string
        exit();
    } else {
        // Hash the password securely
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['logged_in'] = true;
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php"); // Redirect to home page without query string
                exit();
            } else {
                // Incorrect password
                header("Location: index.php"); // Redirect to the login page without query string
                exit();
            }
        } else {
            // No user found
            header("Location: index.php"); // Redirect to the login page without query string
            exit();
        }
    }
} else {
    header("Location: index.php"); // Redirect to the login page without query string
    exit();
}
?>