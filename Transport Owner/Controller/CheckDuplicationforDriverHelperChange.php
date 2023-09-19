<?php  
require_once '../Model/Model.php';
session_start();

if(isset($_SESSION['uname']))
{
 
 
        $transportregnumber= $_POST['transportregnumber'];
        $license= $_POST['license'];
        $dphnnumber= $_POST['dphnnumber'];
        $dname= $_POST['dname'];
        $username=$_SESSION['uname'];  
        
        $res=CheckChangeTransportInformation($transportregnumber,$license,$dphnnumber,$username);
         if ($res==2) {
          echo "license exists";
        }if ($res==3) {
            echo "Phone exists";
        }if($res==0) {
          echo "not exists";
        }     
}
else
{
    header("Location:../View/Login.html");
}


?>