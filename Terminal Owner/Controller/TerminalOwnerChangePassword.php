<?php  
require_once '../Model/Model.php';
 session_start();
 $data['password'] =password_hash($_POST['password'],PASSWORD_DEFAULT);
  $data['username'] = $_SESSION['uname'];
  if (Terminalownerchangepass($data)) {
  	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Passoword Has Been Changed</p>';
  }
 else {
	echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You are not allowed to access this page.</p>';
  }         
  echo '<div style="text-align:center;"><a href="../View/TerminalOwnerWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>';

// }

?>