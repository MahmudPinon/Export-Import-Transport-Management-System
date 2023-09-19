<?php 
    include '../Controller/ExporterImporterWorkstartController.php';
          //$username=$_POST["username"];
		  //echo "<center><h2>Welcome ".getName($username). "</h2></center>";
                  session_start();
	              //echo ($_SESSION['uname']);// =$_POST["username"];
		          //$_SESSION['pass'] = $_POST['password'];


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title> 
<link rel="stylesheet" href="../../Transport Owner/Style/TrnasportOwnerReg.css">
<style>
		body {
			background-color: lightblue;
		}
        fieldset {
			background-color: black;
		}
	</style>
</head>
<body>
<br />
<div>  
<fieldset style="text-align:center;">   
<div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporterCorporationName.html" style="color: white; text-decoration: none;">Set the Corporation Name</a></br>
</div>
</br>
	</br>            
<div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporterRegisterProduct.html" style="color: white; text-decoration: none;">Register The Product</a></br>
</div>
</br>
	</br>
    <div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporter_EditProfile.html" style="color: white; text-decoration: none;">Edit Profile</a></br>
</div>
</br>
	</br>
    <div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporter_View_Profile.php" style="color: white; text-decoration: none;">View Profile</a></br>
</div>
</br>
	</br>
    <div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporter_Report_Terminal.html" style="color: white; text-decoration: none;">Report Terminal</a></br>
</div>
</br>
	</br>
    <div style="display:inline-block; border: 1px solid magenta; padding: 5px; margin-right: 10px; background-color: lightskyblue;width: 200px;height: 35px;">
    <a href="ExporterImporter_See_Bookig_Requests.php" style="color: white; text-decoration: none;">See Requests For Renting the Product</a></br>
</div>
</br>
	</br>
<div style="display:inline-block; border: 1px solid magenta; padding: 5px;  margin-right: 10px; background-color: lightskyblue;width: 200px;height: 20px;">
    <a href="ExporterImporterLogOut.php" style="color: white; text-decoration: none;">LogOut</a></br>
</div>
</fieldset>

</body>
</html>