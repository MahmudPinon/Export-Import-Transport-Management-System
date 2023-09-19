<?php 

require_once 'db_connect.php';

function addRegisterMember($data){
	$conn = db_conn();
    
    $sql = "INSERT INTO registration (`Name`, `User Name`, `Email`, `Password`, `Business Identification Number`, `Phone Number`, `Date of Birth`, `Age`, `Address`, `User Type`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssiss",$data['name'],$data['username'],$data['email'],$data['password'], $data['binnumber'],$data['phonenumber'],$data['dateofbirth'],$data['age'],$data['address'],$data['usertype']);
        $stmt->execute();
        
        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function CheckRegUsername($username,$email,$binenumber,$phonenumber){
	$conn = db_conn();
    
    $sql1 = "SELECT * FROM registration WHERE `User Name` = ?";
    $sql2= "SELECT * FROM registration WHERE `Email` = ?";
    $sql3 = "SELECT * FROM registration WHERE `Business Identification Number`= ?";
    $sql4 = "SELECT * FROM registration WHERE `Phone Number`= ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);
    $stmt4 = $conn->prepare($sql4);
   
    $stmt1->bind_param("s",$username);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s",$email);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("s",$binenumber);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    $stmt4->bind_param("s",$phonenumber);
    $stmt4->execute(); 
    $result4 = $stmt4->get_result();
    if ($result1->num_rows > 0) {
        //ECHO "true";
        return 1;
        $conn = null;
    }
    if ($result2->num_rows > 0) {
        //ECHO "true";
        return 2;
        $conn = null;
    }
    if ($result3->num_rows > 0) {
        //ECHO "true";
        return 3;
        $conn = null;
    }
    if ($result4->num_rows > 0) {
        //ECHO "true";
        return 4;
        $conn = null;
    }

    else  
    {
        //ECHO "hELLO";
        return 0;
        $conn = null;
    }
}

function CheckUserLoginPass($username)
{
    $conn = db_conn();
    $sql = "SELECT `Password` FROM registration WHERE `User Name` = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $password = $row["Password"];
        return $password;
        $conn = null;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}
function checkapprove($username)
{
    $conn = db_conn();
    $sql = "SELECT `Control Panel Approval(Yes/No)` FROM registration WHERE `User Name` = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $password = $row["Control Panel Approval(Yes/No)"];
        return $password;
        $conn = null;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}

function getusertype($username)
{
    $conn = db_conn();
    $sql = "SELECT `User Type` FROM registration WHERE `User Name` = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $usertype = $row["User Type"];
        return $usertype;
        $conn = null;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}



function TerminalNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT `TerminalName` FROM terminalnames WHERE `Control Panel Approval(Yes/No)` = 'Yes'";
    try {
        $result = $conn->query($sql);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function CheckRegVehicle($transportregnumber,$license,$dphnnumber){
	$conn = db_conn();
    
    $sql1 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Transport Registration Number` = ?";
    $sql2= "SELECT * FROM registereddriverhelperandvehicle WHERE `Driver License Number` = ?";
    $sql3 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Driver Phone Number`= ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);
   
    $stmt1->bind_param("s",$transportregnumber);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s",$license);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("s",$dphnnumber);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    if ($result1->num_rows > 0) {
        //ECHO "true";
        return 1;
        $conn = null;
    }
    if ($result2->num_rows > 0) {
        //ECHO "true";
        return 2;
        $conn = null;
    }
    if ($result3->num_rows > 0) {
        //ECHO "true";
        return 3;
        $conn = null;
    }
    else  
    {
        //ECHO "hELLO";
        return 0;
        $conn = null;
    }
}

function RegisterVehicleandDriver($data)
{
    $conn = db_conn();
    
    $sql = "INSERT INTO registereddriverhelperandvehicle (`Transport Registration Number`, `Driver Name`, `Helper Name`, `Driver License Number`, `Driver Age`, `Driver Date Of Birth`, `Helper Age`, `Helper Date Of Birth`, `Driver Phone Number`, `Selected Terminal`,`TrnasportOwnerUserName`)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssisissss",$data['transportregnumber'],$data['dname'],$data['hname'],$data['license'], $data['dage'],$data['ddob'],$data['hage'],$data['hdob'],$data['dphnnumber'],$data['terminalName'],$data['transportownername']);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function CheckRegEditTrnasport($email, $phonenumber, $username)
{
    $conn = db_conn();
    
    $sql1 = "SELECT * FROM registration WHERE `Email` = ? AND `User Name` != ?";
    $sql2 = "SELECT * FROM registration WHERE `Phone Number` = ? AND `User Name` != ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
   
    $stmt1->bind_param("ss", $email, $username);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("ss", $phonenumber, $username);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    if ($result1->num_rows > 0) {
        //ECHO "true";
        $conn = null;
        return 1;
    }
    if ($result2->num_rows > 0) {
        //ECHO "true";
        $conn = null;
        return 2;
    }
    else {
        //ECHO "hELLO";
        $conn = null;
        return 0;
    }
}

function RegisteredTrnasportEditProfile($data)
{
    $conn = db_conn();
    
    $sql = "UPDATE registration SET `Name`=?, `Email`=?, `Phone Number`=?, `Date of birth`=?, `Age`=?, `Address`=? WHERE `User Name`=?";

    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssiss",$data['name'],$data['email'],$data['phonenumber'],$data['dateofbirth'], $data['age'],$data['address'],$data['username']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function provideindividualinfo($username){
	$conn = db_conn();
    $sql = "SELECT * FROM `registration` where `User Name` = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute(); 
        $result = $stmt->get_result();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $row = $result->fetch_assoc();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $row;
}


function CheckChangeTransportInformation($transportregnumber, $license, $dphnnumber, $username)
{
    $conn = db_conn();
 
    $sql2 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Driver License Number` = ? AND `Transport Registration Number` != ?";
    $sql3 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Driver Phone Number` = ? AND `Transport Registration Number` != ?";

    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);

    $stmt2->bind_param("ss", $license, $transportregnumber);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("ss", $dphnnumber, $transportregnumber);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    if ($result2->num_rows > 0) {
        return 2;
    }
    elseif ($result3->num_rows > 0) {
        return 3;
    }
    else {
        return 0;
    }
}

function CheckChangeTransportInformation1($transportregnumber,$username)
{
    $conn = db_conn();
 
    $sql2 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Transport Registration Number` = ?";
    $sql3 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Transport Registration Number` = ? AND `TrnasportOwnerUserName` = ?";

    $stmt2 = $conn->prepare($sql2);
    

    $stmt2->bind_param("s", $transportregnumber);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("ss", $transportregnumber, $username);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    if ($result2->num_rows == 0) {
        return 1;
    }
    if ($result3->num_rows == 0) {
        return 2;
    }
    else {
        return 0;
    }
}
function provideTransportInfo($transportregnumber){
	$conn = db_conn();
    $sql = "SELECT * FROM `registereddriverhelperandvehicle` where `Transport Registration Number` = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$transportregnumber);
        $stmt->execute(); 
        $result = $stmt->get_result();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $row = $result->fetch_assoc();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $row;
}


function RegisteredTrnasportVehicleChange($data)
{
    $conn = db_conn();
    
    $sql = "UPDATE registereddriverhelperandvehicle SET `Driver Name`=?, `Helper Name`=?, `Driver License Number`=?, `Driver Age`=?, `Driver Date Of Birth`=?, `Helper Age`=?, `Helper Date Of Birth`=?, `Driver Phone Number`=? WHERE `TrnasportOwnerUserName`=? AND `Transport Registration Number`=?";
    
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssisissss",$data['dname'],$data['hname'],$data['license'],$data['dage'], $data['ddob'],$data['hage'],$data['hdob'], $data['dphnnumber'],$data['username'],$data['transportregnumber']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function CheckforStatus($transportregnumber,$username)
{
    $conn = db_conn();
 
    $sql2 = "SELECT * FROM registereddriverhelperandvehicle WHERE `Transport Registration Number` = ?";
    $sql3 = "SELECT * FROM registereddriverhelperandvehicle WHERE `TrnasportOwnerUserName` = ? AND `Transport Registration Number` = ?";

    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);

    $stmt2->bind_param("s", $transportregnumber);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("ss", $username, $transportregnumber);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    if ($result2->num_rows ==0) {
        return 1;
    }
    elseif ($result3->num_rows ==0) {
        return 2;
    }
    else {
        return 0;
    }
}

function RegisterVehicelstatus($data)
{
    $conn = db_conn();
    
    $sql = "UPDATE registereddriverhelperandvehicle SET `Status`=? WHERE `TrnasportOwnerUserName`=? AND `Transport Registration Number`=?";
    
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$data['status'],$data['username'],$data['transportregnumber']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}
function reqimportproduct()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `importproduct` WHERE `ProductBookStatus`='No'";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
function reqexportproduct()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `exportproduct` WHERE `ProductStatus(Booked/Unbooked))`='No'";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


function checkproductidandother($username,$productid,$regnum)
{
    $conn = db_conn();
    $sql1 = "SELECT * FROM `exportproduct` WHERE `ProductId`=?";
    $sql2 = "SELECT * FROM `importproduct` WHERE `ProductId`=?";
    $sql3 = "SELECT `ProductStatus(Booked/Unbooked))` FROM `exportproduct` WHERE `ProductId`=?";
    $sql4 = "SELECT `ProductBookStatus` FROM `importproduct` WHERE `ProductId`=?";
    $sql5 = "SELECT * FROM `registereddriverhelperandvehicle` WHERE `Transport Registration Number`=?";
    $sql6 = "SELECT * FROM `registereddriverhelperandvehicle` WHERE `Transport Registration Number`=? AND `TrnasportOwnerUserName`=?";
    $sql7 = "SELECT `Status` FROM `registereddriverhelperandvehicle` WHERE `Transport Registration Number`=? AND `TrnasportOwnerUserName`=?";
    $sql8 = "SELECT * FROM `requestbytransportowner` WHERE `ReqTransportReg`=? AND `ProductId`=?";
    
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);
    $stmt4 = $conn->prepare($sql4);
    $stmt5 = $conn->prepare($sql5);
    $stmt6 = $conn->prepare($sql6);
    $stmt7 = $conn->prepare($sql7);
    $stmt8 = $conn->prepare($sql8);

    $stmt1->bind_param("s", $productid);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s", $productid);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    $stmt3->bind_param("s", $productid);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();

    $stmt4->bind_param("s", $productid);
    $stmt4->execute(); 
    $result4 = $stmt4->get_result();

    $stmt5->bind_param("s", $regnum);
    $stmt5->execute(); 
    $result5 = $stmt5->get_result();

    $stmt6->bind_param("ss", $regnum, $username);
    $stmt6->execute(); 
    $result6 = $stmt6->get_result();

    $stmt7->bind_param("ss", $regnum, $username);
    $stmt7->execute(); 
    $result7 = $stmt7->get_result();

    $stmt8->bind_param("ss", $regnum, $productid);
    $stmt8->execute(); 
    $result8 = $stmt8->get_result();

    if ($result1->num_rows ==0 && $result2->num_rows ==0) {
        return 1;
    }
    elseif (($result3->num_rows ==0 && $result4->fetch_assoc()['ProductBookStatus'] == 'Yes') || ($result4->num_rows ==0 && $result3->fetch_assoc()['ProductStatus(Booked/Unbooked))'] == 'Yes')) {
        return 2;
    }
    elseif (($result5->num_rows ==0 )) {
        return 3;
    }
    elseif (($result6->num_rows ==0 )) {
        return 4;
    }
    elseif (($result6->num_rows ==1 && $result7->fetch_assoc()['Status']== 'Booked')) {
        return 5;
    }
    elseif ($result8->num_rows>0) {
        return 6;
    }
    else {
        return 0;
    }

}


function getproductOwner($productid)
{
    $conn = db_conn();
    $sql1 = "SELECT * FROM `exportproduct` WHERE `ProductId`=?";
    $sql2 = "SELECT * FROM `importproduct` WHERE `ProductId`=?";

    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);

    $stmt1->bind_param("s", $productid);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s", $productid);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();

    if($result1->num_rows ==1)
    {
        $row = $result1->fetch_assoc();
        return $row["ProductOwnerUserId"];
    }
    else if($result2->num_rows ==1)
    {
        $row = $result2->fetch_assoc();
        return $row["ProductOwnerUserName"];
    }
}

function requestedsuccessbookproduct($data)
{
    $conn = db_conn();
    
    $sql = "INSERT INTO requestbytransportowner (`ReqTransportReg`, `ProductId`, `productOwnerusername`)
    VALUES (?, ?, ?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$data['regnum'],$data['productid'],$data['username']);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function CheckDemarageinfo($regnum,$prcode,$chkclrdte,$pdte)
{
    $conn = db_conn();
    $sql1 = "SELECT * FROM `requestbytransportowner` WHERE `ReqTransportReg`=? AND `ProductId`=? AND `PickUpdate`=? AND `productcleardate`=? AND `ProductStatus`='Yes'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("ssss",$regnum,$prcode,$chkclrdte,$pdte);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();
    if($result1->num_rows !=1)
    {
        return 1;
    }
    else
    {
        return 0;
    }

}

function exporterimporteresponse($username)
{
    $conn = db_conn();
    $sql = "SELECT * FROM `requestbytransportowner` WHERE `ProductStatus`='Yes' AND `TransportOwnerUsername`=?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username); // Bind the parameter to the query
        $stmt->execute();
        $result = $stmt->get_result();
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close(); // Close the statement
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function CorpNameNamesReturn()
{
    $conn = db_conn();
    $sql = "SELECT `ExporterImporterCorporationName` FROM registration WHERE `ExporterImporterCorporationName` IS NOT NULL";
    try{
        $result = $conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $conn->close(); // Close the database connection
        return $rows;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}

function ReportExporterImporter($data)
{
    $conn = db_conn();
    
    $sql = "INSERT INTO reporteddata (`UserName`, `NumberReport`)
    VALUES (?, ?)";
    try{
        $stmt = $conn->prepare($sql);
        $one = 1;
        $stmt->bind_param("si", $data['corpname'], $one);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function ReportTerminal($data)
{
    $conn = db_conn();
    
    $sql = "INSERT INTO reporteddata (`UserName`, `NumberReport`)
    VALUES (?, ?)";
    try{
        $stmt = $conn->prepare($sql);
        $one = 1;
        $stmt->bind_param("si", $data['terminal'], $one);
        $stmt->execute();
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

// function reduceCapacity($termnl)
// {
//     $conn = db_conn();
//     $sql = "UPDATE terminalregister SET `ContainerCapacity`=`ContainerCapacity`-1 WHERE `TerminalName`=?";
//     try {
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("s", $termnl);
//         $stmt->execute();

//         return true; // return true to indicate success

//     } catch(mysqli_sql_exception $e) {
//         echo "Error: " . $e->getMessage();
//         return false; // return false to indicate failure
//     }
// }
