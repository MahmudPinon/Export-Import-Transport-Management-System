<?php
require_once '../Model/Model.php';
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["phonenumber"]) &&isset($_POST["binnumber"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $phonenumber = $_POST["phonenumber"];
  $binenumber = $_POST["binnumber"];
  $res=CheckRegUsername($username,$email,$binenumber,$phonenumber);
  if ($res==1) {
    echo "exists";
  }  if ($res==2) {
    echo "email exists";
  } if ($res==4) {
    echo "phone exists";
  } if ($res==3) {
    echo "Binnumber exists";
  } if($res==0) {
    echo "not exists";
  }
}

?>
