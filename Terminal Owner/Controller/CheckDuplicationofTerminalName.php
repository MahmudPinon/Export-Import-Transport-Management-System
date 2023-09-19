<?php
require_once '../Model/Model.php';
session_start();
$name=$_POST["name"];
$address=$_POST["address"];
$username=$_SESSION['uname'];
$verify = checkterminalname($name,$username,$address);


if ($verify==1) {
  echo 'exists';
}else if ($verify==2) {
    echo 'you have';
  }else if ($verify==3) {
    echo 'address exists';
  } else {  
  echo $verify;
}

?>
