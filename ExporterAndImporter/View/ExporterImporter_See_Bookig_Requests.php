<?php  
require_once '../Controller/ExporterImporterViewProductBookingRequestController.php';
require_once '../Controller/ExporterImporterViewProductBookingRequestVehicleController.php';
require_once '../Controller/ExporterImporterViewProductBookingRequestTransportOwnerController.php';
require_once '../Controller/ExporterImporterViewProductBookingRequestFullProductController.php';
//session_start();


if (isset($_SESSION['uname'])) {
	$reqforproduct = fetchProduct($_SESSION['uname']);
	}else{
	header("location:Login.html");
}
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
        <style>
  h3 {
    color: blue;
    font-size: 34px;
    text-align: center;
  }
  h2 {
    color: blue;
    font-size: 24px;
    text-align: center;
  }
  body {
			background-color: lightblue;
		}
        fieldset {
			background-color: black;
		}
</style>
<h2>Just Click in the Accept The Vehicle Which You Want to Give Rent</h2></br>
</head>
<body>
<h3 style="text-align:center;">Booking Requests</h3>
<form >
    <table bgcolor="black" width="1200" align="center">
        <tr bgcolor="#D6EEEE">
            <th width="150">Product Id</th>
            <th width="150">Transport Registration Number</th>
            <th width="150">Driver Name</th>
            <th width="150">Helper Name</th>
			<th width="100">Driver Age</th>
            <th width="100">Helper Age</th>
            <th width="100">Driver Phone Number</th>
            <th width="100">TransportOwner Phone Number</th>
            <th width="100">Product Name</th>
        </tr>
        <?php
if (!empty($reqforproduct)) {

    foreach ($reqforproduct as $row) {
        if ($row['AcceptorRejectByExporterorImporter'] == NULL) {
            $reqvehicleinfo = fetchTransport($row["ReqTransportReg"]);
            $reqvehicleownerinfo = fetchTransportOwner($reqvehicleinfo["TrnasportOwnerUserName"]);
            $reqproductinfo = fetchProductDetails($row['ProductId']);
?>
            <tr bgcolor="lightgrey" align="center">
                <td><?php echo $row['ProductId'] ?></td>
                <td><?php echo $row['ReqTransportReg'] ?></td>
                <td><?php echo $reqvehicleinfo['Driver Name'] ?></td>
                <td><?php echo $reqvehicleinfo['Helper Name'] ?></td>
                <td><?php echo $reqvehicleinfo['Driver Age'] ?></td>
                <td><?php echo $reqvehicleinfo['Helper Age'] ?></td>               
                <td><?php echo $reqvehicleinfo['Driver Phone Number'] ?></td>                          
                <td><?php echo $reqvehicleownerinfo['Phone Number'] ?></td>
                <td><?php 
                    if (isset($reqproductinfo['Name'])) {
                        echo $reqproductinfo['Name'];
                    } elseif (isset($reqproductinfo['ProductName'])) {
                        echo $reqproductinfo['ProductName'];
                    } 
                ?></td>
                
            </tr>
<?php
        }
    }
} else {
?>
    <div style="text-align: center; color: red; font-size: 24px;">No New Request Available</div>
<?php
}
?>


    </table>
	<div style="text-align:center; margin-top: 20px;">
    <div style="text-align:center;"><a href="../View/ProvidetheRent.html" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Provide the Rent</a></div>
</br>
		<div style="text-align:center;"><a href="../View/ExporterAndImporterWorkStart.php" style="display:inline-block; padding:10px 20px; border:1px solid blue; color:blue; text-decoration:none;">Home</a></div>
  
    </div>

</form>


</body>
</html>