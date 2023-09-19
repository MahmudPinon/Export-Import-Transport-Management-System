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
        
        $chk=provideTransportInfo($transportregnumber);
  if($chk['Driver Name']!=$dname && $chk['Driver License Number']==$license  && $chk['Driver Phone Number']!=$dphnnumber)
  {
    echo "Drive Change but License Not";
  }
  if($chk['Driver Name']!=$dname && $chk['Driver License Number']!=$license  && $chk['Driver Phone Number']==$dphnnumber)
  {
    echo "Drive Change but Phone Not";
  }
  if($chk['Driver Name']!=$dname && $chk['Driver Phone Number']==$dphnnumber && $chk['Driver License Number']==$license)
  {
    echo "Drive Change but License and Phone Not";
  }
  if($chk['Driver Name']!=$dname && $chk['Driver Phone Number']!=$dphnnumber && $chk['Driver License Number']==$license)
  {
    echo "not exists";
  }
      
      
 
}
else
{
    header("Location:../View/Login.html");
}

?>