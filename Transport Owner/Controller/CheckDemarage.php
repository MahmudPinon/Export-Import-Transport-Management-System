<?php
require_once '../Model/Model.php';
if (isset($_POST["regnum"]) && isset($_POST["prcode"]) && isset($_POST["chkclrdte"]) &&isset($_POST["pdte"])) {
  $regnum = $_POST["regnum"];
  $prcode = $_POST["prcode"];
  $chkclrdte = $_POST["chkclrdte"];
  $pdte = $_POST["pdte"];
  $res=CheckDemarageinfo($regnum,$prcode,$chkclrdte,$pdte);
  if ($res==1) {
    echo "exists";
  } if($res==0) {
    echo "not exists";
  }
}

?>
