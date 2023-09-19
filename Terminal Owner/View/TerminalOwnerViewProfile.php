<?php  
require_once '../Controller/TerminalOwnerViewProfileController.php';
//session_start();


if (isset($_SESSION['uname'])) {
	$student = fetchPerson($_SESSION['uname']);
	
	}else{
	header("location:../../Transport Owner/View/Login.html");
}
?>

<!DOCTYPE html>

<html>
<head>
    <title >View Profile</title>
</head>
<body>
    
<style>
  h3 {
    color: blue;
    font-size: 34px;
    text-align: center;
  }
</style>

<h3>Profile</h3>


    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240" >Name</th>
            <th width="150">Email</th>
            <th width="150">Business identification Number</th>
            <th width="150">Phone number</th>
			<th width="200">Date of birth(Year-Day-Month)</th>
            <th width="150">Age</th>
            <th width="150">Address</th>
            <th width="150">User type</th>
			<th width="100">Edit Profile</th>
        </tr>
        <tr bgcolor="lightgrey" align="center">
		<td><a href="TerminalOwnerViewProfile.php?id=<?php echo $student['Serial Number'] ?>"><?php echo $student['Name'] ?></a></td>
		<td><?php echo $student['Email'] ?></td>
		<td><?php echo $student['Business Identification Number'] ?></td>
		<td><?php echo $student['Phone Number'] ?></td>
		<td><?php echo $student["Date of Birth"] ?></td>
		<td><?php echo $student['Age'] ?></td>
		<td><?php echo $student['Address'] ?></td>
		<td><?php echo $student['User Type'] ?></td>
		<td><a href="TerminalOwnerEditProfile.html?id=<?php echo $student['Serial Number'] ?>">Edit</a></td>
        </tr>
    </table>
</br>
</br>
</br>
     <div style="text-align:center;"><a href="../View/TerminalOwnerWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>;
  
  
    
</body>
</html>