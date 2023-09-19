<?php

include '../Controller/ReturnRequestedTransportController.php';
session_start();
$username=$_SESSION['uname'];
$res1=returnterminal($username);
if($res1==0)
{
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Have not Registered Any Terminal</p>';
}
$res=returnreqTransport();
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
            <th width="240">Transport Registration Number</th>
            <th width="150">Driver Name</th>
            <th width="200">Helper Name</th>
            <th width="150">Driver License Number</th>
            <th width="150">Driver Age</th>
            <th width="150">Helper Age</th>
            <th width="150">Driver Phone Number</th>
            <th width="150">TrnasportOwnerUserName</th>
            <th width="100">TerminalOwner Approval(Yes/No)</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['TerminalOwnerApproval'] == NULL  && $row['Selected Terminal']==$res1) {
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['Transport Registration Number'] ?></td>
                <td><?php echo $row['Driver Name'] ?></td>
                <td><?php echo $row['Helper Name'] ?></td>
                <td><?php echo $row['Driver License Number'] ?></td>
                <td><?php echo $row["Driver Age"] ?></td>
                <td><?php echo $row['Helper Age'] ?></td>
                <td><?php echo $row['Driver Phone Number'] ?></td>
                <td><?php echo $row['TrnasportOwnerUserName'] ?></td> 
                <td>
                    <?php echo $row['TerminalOwnerApproval'] ?>
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
		<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px;" onclick="location.href='TerminalOwnerWorkStart.php'">Home</button>

    </div>

</form>


</body>
</html>