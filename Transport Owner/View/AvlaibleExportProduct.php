<?php

include '../Controller/ReturnAvlaibleExport.php';
$res=reqexportreturn();

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
<h3 style="text-align:center;">Export Product</h3>
<form >
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240">Product Name</th>
            <th width="150">Product Weight</th>
            <th width="150">Product Type</th>
            <th width="150">Destination Terminal</th>
            <th width="200">Product PickUp Place</th>
            <th width="150">Rent</th>
            <th width="150">Corporation Name</th>
            <th width="150">Product Id</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['ProductStatus(Booked/Unbooked))'] =="No" AND $row['TerminalOwnerApproval']=='Yes') {
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['Name'] ?></td>
                <td><?php echo $row['Weight'] ?></td>
                <td><?php echo $row['ProductType'] ?></td>
                <td><?php echo $row['Terminal'] ?></td>
                <td><?php echo $row["PickUpPlace"] ?></td>
                <td><?php echo $row['Rent'] ?></td>
                <td><?php echo $row['CorporationName'] ?></td>
                <td><?php echo $row['ProductId'] ?></td>
            </tr>
<?php
        }
    }
}
else
{
?>
    <div style="text-align: center; color: red; font-size: 24px;">No New Product Available</div>
<?php
}
?>

    </table>
	<div style="text-align:center; margin-top: 20px;">
		<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px;" onclick="location.href='TranspoertWonerWorkstart.php'">Home</button>

    </div>

</form>


</body>
</html>