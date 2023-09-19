<?php  
require_once '../Model/Model.php';
session_start();
$flag=0;

if(isset($_SESSION['uname']))
{

    if (isset($_POST['submit'])) {

        $data['transportregnumber'] = $_POST['transportregnumber'];
        $data['dname'] = $_POST['dname'];
        $data['hname'] = $_POST['hname'];
        $data['license'] = $_POST['license'];
        $data['ddob'] = $_POST['ddob'];
        $data['hdob'] =$_POST['hdob'];
        $data['dphnnumber'] = $_POST['dphnnumber'];
        $data['terminalName'] =$_POST['terminalName'];
      
  
  
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
      
      
      $data['transportownername']=$_SESSION['uname'];
      if (RegisterVehicleandDriver($data)) {
        // reduceCapacity($data['TerminalName']);
          echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Successfully Registered Driver Helper and Vehicle !!</p>';
          // header('Location: ../View/ViewProfile.php?id=' .$_SESSION['uname']);
      }
     else {
        //echo 'You are not allowed to access this page.';
        echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.!!</p>';
      }
      echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';
  
  
  
  
    }
}



?>