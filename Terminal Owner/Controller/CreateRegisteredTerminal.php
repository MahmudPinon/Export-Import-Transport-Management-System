<?php
require_once '../Model/Model.php';
session_start();
$username = $_SESSION['uname'];
$Name=$_POST['name'];
$Container_Capacity=$_POST['contcapacity'];
$Number_of_Recruited_People=$_POST['recruitedpeople'];
$Container_Handle_Capacity=$_POST['conthandlecapacity'];
$Address=$_POST['address'];

if(registerterminal($username,$Name,$Container_Capacity,$Number_of_Recruited_People,$Container_Handle_Capacity,$Address))  
{
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request is UnderChecking Please Be petient</p>';
}
else
{
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;"> There is Some Problem .Please Try Again</p>';
}
echo '<div style="text-align:center;"><a href="../View/TerminalOwnerWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

?>
