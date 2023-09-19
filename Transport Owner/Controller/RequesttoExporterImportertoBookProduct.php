<?php  
require_once '../Model/Model.php';

if (isset($_POST['submit'])) {
    session_start();
  $data['productid'] = $_POST['productid'];
  $data['regnum'] = $_POST['regnum'];
   
  $getproductOwner=getproductOwner($data['productid']);
  $data['username']=$getproductOwner;
  if(requestedsuccessbookproduct($data))
  {
          echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Request Has Been Sent Please Keep Eye on The Rensponse.</p>';
          echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

  }

  else
  {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Are Not Allowed To Access This Page.</p>';
    echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';
  }
         
  
}
else{
    echo '<div style="text-align:center;"><a href="../View/TranspoertWonerWorkstart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';
 
}
?>