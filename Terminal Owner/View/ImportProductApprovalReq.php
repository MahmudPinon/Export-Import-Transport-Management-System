<?php

include '../Controller/ReturnTerminalImportProductController.php';
session_start();
$username=$_SESSION['uname'];
$res1=returnterminal($username);
if($res1==0)
{
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Have not Registered Any Terminal</p>';
}
$res=returnImportproduct();
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
<form action="../Controller/TerminalOwnerImportProductApprovalController.php" method="POST">
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240">Name</th>
            <th width="150">Weight</th>
            <th width="150">ProductType</th>
            <th width="150">Imported From</th>
            <th width="200">Terminal</th>
            <th width="150">Price</th>
            <th width="150">PickUpPlace</th>
            <th width="150">CorporationName</th>
            <th width="150">ProductId</th>
            <th width="150">ProductOwnerUserId</th>
            <th width="100">TerminalOwner Approval(Yes/No)</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['TerminalOwnerApproval'] == NULL  && $row['pickupterminalName']==$res1) {
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['ProductName'] ?></td>
                <td><?php echo $row['Weight'] ?></td>
                <td><?php echo $row['ProductType'] ?></td>
                <td><?php echo $row['importfrom'] ?></td>
                <td><?php echo $row["pickupterminalName"] ?></td>
                <td><?php echo $row['ProductPrice'] ?></td>
                <td><?php echo $row['Destination'] ?></td>
                <td><?php echo $row['CorporationName'] ?></td>                
                <td><?php echo $row['ProductId'] ?></td>
                <td><?php echo $row['ProductOwnerUserName'] ?></td>
                <td>
                    <?php echo $row['TerminalOwnerApproval'] ?>
                    <label><input type="radio" name="approval_<?php echo $row['ProductId'] ?>" value="Yes">Yes</label>
                    <label><input type="radio" name="approval_<?php echo $row['ProductId'] ?>" value="No">No</label>
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