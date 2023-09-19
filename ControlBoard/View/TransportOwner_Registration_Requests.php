<?php

include '../Controller/ReturnTransportOwnerRegReqController.php';
$res=reqtransresreturn();
// if(empty($res))
//         {
//             echo "No Request";
//         }
//         else
//         {
//               foreach ($res as $row) {
// 				echo $row['User Name'];
// 				echo $row['Email'];
// 			}
//         }
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
<h3 style="text-align:center;">Requests</h3>
<form action="../Controller/TransportOwnerApprovalController.php" method="POST">
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240">Name</th>
            <th width="150">Email</th>
            <th width="150">Business identification Number</th>
            <th width="150">Phone number</th>
            <th width="200">Date of birth(Year-Day-Month)</th>
            <th width="150">Age</th>
            <th width="150">Address</th>
            <th width="150">User type</th>
            <th width="100">Control Panel Approval(Yes/No)</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['Control Panel Approval(Yes/No)'] == NULL && $row['User Type'] == "transportowner") {
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Email'] ?></td>
                <td><?php echo $row['Business Identification Number'] ?></td>
                <td><?php echo $row['Phone Number'] ?></td>
                <td><?php echo $row["Date of Birth"] ?></td>
                <td><?php echo $row['Age'] ?></td>
                <td><?php echo $row['Address'] ?></td>
                <td><?php echo $row['User Type'] ?></td>
                <td>
                    <?php echo $row['Control Panel Approval(Yes/No)'] ?>
                    <label><input type="radio" name="approval_<?php echo $row['Serial Number'] ?>" value="Yes">Yes</label>
                    <label><input type="radio" name="approval_<?php echo $row['Serial Number'] ?>" value="No">No</label>
                </td>
            </tr>
<?php
        }
    }
}
else
{
?>
    <div style="text-align: center; color: red; font-size: 24px;">No New Request Available</div>
    
<?php
}
?>

    </table>
	<div style="text-align:center; margin-top: 20px;">
        <button style="background-color: gray; padding: 10px 20px; font-size: 16px;" type="submit">Submit</button>
		<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px;" onclick="location.href='WorkStartControlpanel.php'">Home</button>

    </div>

</form>


</body>
</html>