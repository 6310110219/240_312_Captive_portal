<?php
session_start();
ob_start();

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // insert data into database
  $sql = "INSERT INTO users (username, password, name, email, phone) VALUES ('$username', '$password', '$name', '$email', '$phone')";
  if ($conn->query($sql) === TRUE) {
    // echo "Registration Successful!";
    // sleep(3);
    // header("Location: login.html");
    echo "Registration Successful!";
  header("Location: 2; URL=login.html");
    exit();
  } else {
    echo "Error";
  }
}

mysqli_close($conn);
ob_end_flush();
?>