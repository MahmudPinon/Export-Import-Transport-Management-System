<?php 

require_once 'db_connect.php';



function checkterminalname($name,$username,$address)
{
    $conn = db_conn();
    
    $sql1 = "SELECT * FROM terminalnames WHERE `TerminalName` = ?";
    $sql2 = "SELECT * FROM terminalnames WHERE `TerminalOwnerUserName` = ?";
    $sql3 = "SELECT * FROM terminalnames WHERE `Address` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);
    $stmt3 = $conn->prepare($sql3);

    $stmt1->bind_param("s", $name);
    $stmt1->execute(); 
    $result1 = $stmt1->get_result();

    $stmt2->bind_param("s",$username);
    $stmt2->execute(); 
    $result2 = $stmt2->get_result();


    $stmt3->bind_param("s",$address);
    $stmt3->execute(); 
    $result3 = $stmt3->get_result();


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
    if ($result3->num_rows > 0) {
        //ECHO "true";
        $conn = null;
        return 3;
    }
    else {
        //ECHO "hELLO";
        $conn = null;
        return 0;
    }
}

function registerterminal($username,$Name,$Container_Capacity,$Number_of_Recruited_People,$Container_Handle_Capacity,$Address)
{
    $conn = db_conn();
    
    $sql = "INSERT INTO terminalnames (`TerminalName`, `Container Capacity`, `Number of Recruited People`, `Container Handle Capacity`, `Address`, `TerminalOwnerUserName`)
    VALUES (?, ?, ?, ?, ?, ?)";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss",$Name,$Container_Capacity,$Number_of_Recruited_People,$Container_Handle_Capacity, $Address,$username);
        $stmt->execute();
        
        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function checkstatus2($username)
{
    $conn = db_conn();

    $sql = "SELECT * FROM terminalnames WHERE `TerminalOwnerUserName` = ? ORDER BY `Serial Number` DESC LIMIT 1";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $conn = null;
        
        if ($row) {
            return $row['Control Panel Approval(Yes/No)'];
        } else {
            return 0; // No matching row found
        }
    } catch (mysqli_sql_exception $e) {
        return "Error: " . $e->getMessage();
    }
}

function CheckRegEditTerminalOwner($email, $phonenumber, $username)
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

function RegisteredTerminalOwnerEditProfile($data)
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

function modelreturnterminal($username)
{
    $conn = db_conn();

    $sql = "SELECT * FROM terminalnames WHERE `TerminalOwnerUserName` = ? AND `Control Panel Approval(Yes/No)` ='Yes'";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        $conn = null;
        
        if ($row) {
            return $row['TerminalName'];
        } else {
            return 0; // No matching row found
        }
    } catch (mysqli_sql_exception $e) {
        return "Error: " . $e->getMessage();
    }
}

function reqregexportproduct()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `exportproduct`";
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

function reqregimportproduct()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `importproduct`";
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

function reqregtransport()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `registereddriverhelperandvehicle`";
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
function update_importproduct_approval($ProductId, $approval_value)
{
    $conn = db_conn();
    $sql = "UPDATE `importproduct` SET `TerminalOwnerApproval` = '$approval_value' WHERE `ProductId` = '$ProductId'";
  $result = $conn->query($sql);
  if (!$result) {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}

function update_exportproduct_approval($ProductId, $value)
{
    $conn = db_conn();
    $sql = "UPDATE `importproduct` SET `TerminalOwnerApproval` = '$approval_value' WHERE `ProductId` = '$ProductId'";
  $result = $conn->query($sql);
  if (!$result) {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}

function Terminalownerchangepass($data)
{
    $conn = db_conn();  
    $sql = "UPDATE registration SET `Password`=? WHERE `User Name`=?";
   
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$data['password'],$data['username']);
        $stmt->execute();

        //echo "Records inserted successfully!";
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
    return true;
}