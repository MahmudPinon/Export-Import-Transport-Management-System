<?php  
require_once '../Model/Model.php';

if (isset($_POST['submit'])) {
    session_start();
//  echo  $_POST['name'];
  $data['name'] = $_POST['name'];
  $data['weight'] = $_POST['weight'];
  $data['producttypeselect'] = $_POST['producttypeselect'];
  $data['exportedto'] = $_POST['exportedto'];
  $data['terminalName'] = $_POST['terminalName'];
  $data['prdctprice'] = $_POST['prdctprice'];
  $data['prpickupplace'] = $_POST['prpickupplace'];
  $data['rent'] = $_POST['rent'];
  $data['username'] =$_SESSION['uname'];
  $username=$_SESSION['uname'];  
  $getcorpname=getcorporationname($username);
  if($getcorpname['ExporterImporterCorporationName']==NULL)
  {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">First You Need to Register your Corporation than you can use the System.</p>';
    
  }
  else
  {
    $data['corpname'] = $getcorpname['ExporterImporterCorporationName'];
    if (RegisteredExporterProduct($data)) {
        echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Product Has Been Register</p>';
    }
   else {
      echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
    }
  }
         
  echo '<div style="text-align:center;"><a href="../View/ExporterAndImporterWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}

?>