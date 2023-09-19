<?php  
require_once '../Model/Model.php';

  $data['name'] = $_POST['name'];
  $data['username'] = $_POST['username'];
  $data['email'] = $_POST['email'];
  $data['binnumber'] = $_POST['binnumber'];
  $data['address'] = $_POST['address'];
  $data['dateofbirth'] = $_POST['dob'];
  $data['phonenumber'] = $_POST['phnnumber'];
  $data['usertype'] = $_POST['usertype'];
    
    $input_date=$_POST['dob'];
    $today_date = date("Y-m-d");
    $datetime1 = new DateTime($input_date);
    $datetime2 = new DateTime($today_date);
    $interval = $datetime1->diff($datetime2);
    $daysDiff1 = $interval->y;
    $data['age'] =$daysDiff1;
	  $data['password'] =password_hash($_POST['password'],PASSWORD_DEFAULT);
  
  if (addRegisterMember($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request has been Sent Please Wait</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/TransportOwnerRegistration.html" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

// }

?>