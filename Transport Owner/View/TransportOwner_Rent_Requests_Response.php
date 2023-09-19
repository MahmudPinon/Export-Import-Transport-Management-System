<?php

include '../Controller/ReturnExporterResPonse.php';
$res=seeresponse();

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
<h3 style="text-align:center;">Response</h3>
<form >
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="240">Product Id</th>
            <th width="150">Product TransPort Registration Number</th>
            <th width="150">Product Pick Up Date</th>
            <th width="150">Product Clear Date</th>
        </tr>
		<?php
if(!empty($res))
{
    foreach ($res as $row) {
        if($row['AcceptorRejectByExporterorImporter'] =='Yes') {
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['ProductId'] ?></td>
                <td><?php echo $row['ReqTransportReg'] ?></td>
                <td><?php echo $row['PickUpdate'] ?></td>
                <td><?php echo $row['productcleardate'] ?></td>
            </tr>
<?php
        }
    }
}
else
{
?>
    <div style="text-align: center; color: red; font-size: 24px;">No ResPonse Available</div>
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