<?php  
require_once '../Model/Model.php';
if (isset($_POST['submit'])) {
    session_start();
//  echo  $_POST['name'];
  $data['transportregnumber'] = $_POST['transportregnumber'];
  $data['dname'] = $_POST['dname'];
  $data['hname'] = $_POST['hname'];
  $data['license'] = $_POST['license'];
  $data['ddob'] = $_POST['ddob'];
  $data['hdob'] = $_POST['hdob'];
  $data['dphnnumber'] = $_POST['dphnnumber'];
  $data['username'] =$_SESSION['uname'];  
  $input_date=$_POST['ddob'];
  $today_date = date("Y-m-d");
  $datetime1 = new DateTime($input_date);
  $datetime2 = new DateTime($today_date);
  $interval = $datetime1->diff($datetime2);
  $daysDiff1 = $interval->y;
  $data['dage'] =$daysDiff1;

  $input_date2=$_POST['hdob'];
  $datetime3 = new DateTime($input_date2);
  $datetime4 = new DateTime($today_date);
  $interval1 = $datetime3->diff($datetime4);
  $daysDiff2 = $interval1->y;
  $data['hage'] =$daysDiff2;
  
  if (RegisteredTrnasportVehicleChange($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Registered Vehicle Information Has Been Updated</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}

?>