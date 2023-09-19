<?php 

require_once 'db_connect.php';

function CheckUserLoginPass($username)
{
    $conn = db_conn();
    $sql = "SELECT `password` FROM controlpanel WHERE `username` = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $password = $row["password"];
        return $password;
        $conn = null;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}

function providename($username)
{
    $conn = db_conn();
    $sql = "SELECT `Name` FROM `controlpanel` WHERE `username`=?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $name = $row["Name"];
        return $name;
        $conn = null;
    } catch(mysqli_sql_exception $e) {
        
        echo "Error: " . $e->getMessage();
    }
}


function RegreqTransportOwner()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `registration` WHERE `Control Panel Approval(Yes/No)` IS NULL AND `User Type`='transportowner'";
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

function update_user_approval($serial_number, $approval_value)
{
    $conn = db_conn();
    $sql = "UPDATE `registration` SET `Control Panel Approval(Yes/No)` = '$approval_value' WHERE `Serial Number` = '$serial_number'";
  $result = $conn->query($sql);
  if (!$result) {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}

function RegreqExporterImporter()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `registration` WHERE `Control Panel Approval(Yes/No)` IS NULL AND `User Type`='exporterimporter'";
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

function RegreqTerminalOwner()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `registration` WHERE `Control Panel Approval(Yes/No)` IS NULL AND `User Type`='terminalowner'";
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

function RegReqTerminals()
{
    $conn = db_conn();
    $sql = "SELECT * FROM `terminalnames` WHERE `Control Panel Approval(Yes/No)` IS NULL";
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

function update_terminal_approval($serial_number, $approval_value)
{
    $conn = db_conn();
    $sql = "UPDATE `terminalnames` SET `Control Panel Approval(Yes/No)` = '$approval_value' WHERE `Serial Number` = '$serial_number'";
  $result = $conn->query($sql);
  if (!$result) {
    echo "Error updating record: " . $conn->error;
  }
  $conn->close();
}