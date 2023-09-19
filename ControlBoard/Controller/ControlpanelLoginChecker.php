<?php
require_once '../Model/Model.php';

// get the username and password from the POST data
$username = $_POST['username'];
$password = $_POST['password'];

$respass=CheckUserLoginPass($username);
// echo($password);
// check if the username and password are valid (replace this with your own logic)
if ($respass==$password) {
  // login successful
  echo 'success';
} else {
  // login unsuccessful
  echo 'failure';
}
?>
