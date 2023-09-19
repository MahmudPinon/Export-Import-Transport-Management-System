<?php
require_once '../Model/Model.php';
session_start();
if(isset($_SESSION['uname']))
{
    if (isset($_POST["productid"]) && isset($_POST["regnum"])) {
  $username =$_SESSION['uname'];
  $productid =$_POST["productid"];
  $regnum =$_POST["regnum"];
  $res=checkproductidandother($username,$productid,$regnum);
  if ($res==1) {
    echo "product not exists";
  }  if ($res==2) {
    echo "product booked";
  } if ($res==3) {
    echo "not registered";
  } if ($res==4) {
    echo "not belongs to you";
  } if($res==5) {
    echo "vehicle booked";
  }
  if($res==6) {
    echo "already requested";
  }
  if($res==0) {
    echo "ok";
  }
}
}
else
{
    header("Location:../View/Login.html");
}

?>
