<?php
require_once '../Model/Model.php';
if (isset($_POST["transportregnumber"]) && isset($_POST["license"]) && isset($_POST["dphnnumber"])) {
  $transportregnumber = $_POST["transportregnumber"];
  $license = $_POST["license"];
  $dphnnumber = $_POST["dphnnumber"];
  $res=CheckRegVehicle($transportregnumber,$license,$dphnnumber);
  if ($res==1) {
    echo "exists";
  }  if ($res==2) {
    echo "license exists";
  } if ($res==3) {
    echo "dphnnumber exists";
  } if($res==0) {
    echo "not exists";
  }
}

?>
