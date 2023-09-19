<?php
require_once '../Model/Model.php';
session_start();
if(isset($_SESSION['uname']))
{
    if (isset($_POST["email"]) && isset($_POST["phonenumber"])) {
        $username=$_SESSION['uname'];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $res=CheckRegEditExporterImporter($email,$phonenumber,$username);
        if ($res==1) {
          echo "email exists";
        } if ($res==2) {
          echo "phone exists";
        } if($res==0) {
          echo "not exists";
        }
      }
}
else
{
    header("Location:../View/Login.html");
}


?>
