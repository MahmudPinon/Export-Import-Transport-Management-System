<?php

include '../Controller/ReturnTerminalRegReq.php';
$res=reqterminalreg();
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
<form action="../Controller/TerminalRegReqApprovalController.php" method="POST">
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            
            <th width="240">Terminal Owner Username</th>
            <th width="240">Terminal Name</th>
            <th width="150">Terminal Recruited People</th>
            <th width="150">Terminal Container Handling Capacity</th>
            <th width="150">Terminal Container Capacity</th>
            <th width="200">Address</th>
            <th width="100">Control Panel Approval(Yes/No)</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['Control Panel Approval(Yes/No)'] == NULL) {
?>
            <tr bgcolor="lightgrey" align="center">
            <td><?php echo $row['TerminalOwnerUserName'] ?></td>
                <td><?php echo $row['TerminalName'] ?></td>
                <td><?php echo $row['Number of Recruited People'] ?></td>
                <td><?php echo $row['Container Handle Capacity'] ?></td>
                <td><?php echo $row['Container Capacity'] ?></td>
                <td><?php echo $row["Address"] ?></td>
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