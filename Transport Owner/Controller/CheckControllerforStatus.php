<?php  
require_once '../Model/Model.php';
session_start();

if(isset($_SESSION['uname']))
{
 
 
        $transportregnumber= $_POST['transportregnumber'];
        $username=$_SESSION['uname'];  
        
        $res=CheckforStatus($transportregnumber,$username);
         if ($res==1) {
          echo "transportregnumber not exists";
        }
        if ($res==2) {
            echo "ownername and regnnumber not match";
        }
        if($res==0) {
          echo "not exists";
        }     
}
else
{
    header("Location:../View/Login.html");
}


?>