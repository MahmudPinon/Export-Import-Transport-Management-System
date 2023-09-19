<?php  
require_once '../Model/Model.php';

if (isset($_POST['submit'])) {
    session_start();
//  echo  $_POST['name'];
  $data['prdctid'] = $_POST['prdctid'];
  $data['regnum'] = $_POST['regnum'];
  $data['pd'] = $_POST['pd'];
  $data['cd'] = $_POST['cd'];
  $res1=ReplyExporterImporterRent($data);
  $res2=updateexportimport($data);
  if ( $res1==true && $res2==true) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Succesfully Rented the Product</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/ExporterAndImporterWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

}

?>