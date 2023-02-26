<?php
// establish database connection
$servername = "localhost";
$username = "captive_portal";
$pass = "kali";
$dbname = "captive_portal";
$tbl_name = "users";

$conn = new mysqli($servername, $username, $pass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// get form data
$username = $_POST['username'];
$password = $_POST['password'];

// query the database for the user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// check if the user exists
if ($result->num_rows > 0) {
  // user exists, redirect to dashboard
  header("Location: continue.html");
} else {
  // user does not exist or invalid login credentials
  echo "Invalid login credentials. Please try again.";
  header("Refresh: 2; URL=index.html"); // redirect to login page after 3 seconds
}

// close database connection
$conn->close();
?>
