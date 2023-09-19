<?php  
require_once '../Model/Model.php';
session_start();

if(isset($_SESSION['uname']))
{
if (isset($_POST['submit'])) {
    
//  echo  $_POST['name'];
$data['transportregnumber'] = $_POST['transportregnumber'];
$data['status'] = $_POST['status'];
$data['username'] =$_SESSION['uname'];
if (RegisterVehicelstatus($data)) {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Transport Status Has Been Updated</p>';
}
else {
  echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
}         
echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}
}
else
{
    header("Location:../View/Login.html");
}


?>