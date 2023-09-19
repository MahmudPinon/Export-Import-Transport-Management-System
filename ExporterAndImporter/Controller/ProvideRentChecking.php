<?php
require_once '../Model/Model.php';
session_start();
if(isset($_SESSION['uname']))
{
    if (isset($_POST["prdctid"]) && isset($_POST["regnum"])) {
        $username=$_SESSION['uname'];
        $prdctid = $_POST["prdctid"];
        $regnum = $_POST["regnum"];
        $res=checkbeforerent($username,$prdctid,$regnum);
        if ($res==1) {
          echo "not belongs";
        } if ($res==2) {
          echo "not requested";
        } if($res==3) {
          echo "not exists product";
        }if($res==4) {
          echo "not requested for this product";
        }if($res==5) {
          echo "booked";
        }

      }
}
else
{
    header("Location:../View/Login.html");
}


?>
