<?php
require_once '../Model/Model.php';
session_start();
if (isset($_SESSION['uname'])) {
  if (isset($_POST["corpname"])) {
      $username=$_SESSION['uname'];
      $crpname = $_POST["corpname"];
      $res=CheckCorpName($crpname,$username);
      if ($res==1) {
        echo "corp exists";
      } if ($res==2) {
          echo "corp set already";
      } if ($res==0) {
        echo "not exists";
      }
  }
} else {
  header("Location:../../Transport Owner/View/Login.html");
}
