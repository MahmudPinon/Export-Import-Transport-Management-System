<?php  
require_once '../Model/Model.php';

if (isset($_POST['submit'])) {
    session_start();
//  echo  $_POST['name'];
  $data['name'] = $_POST['name'];
  $data['email'] = $_POST['email'];
  $data['address'] = $_POST['address'];
  $data['dateofbirth'] = $_POST['dob'];
  $data['phonenumber'] = $_POST['phnnumber'];
  $data['username'] =$_SESSION['uname'];  
    $input_date=$_POST['dob'];
    $today_date = date("Y-m-d");
    $datetime1 = new DateTime($input_date);
    $datetime2 = new DateTime($today_date);
    $interval = $datetime1->diff($datetime2);
    $daysDiff1 = $interval->y;
    $data['age'] =$daysDiff1;
  if (RegisteredExporterImporterEditProfile($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Profile Has Been Updated</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}

?>