<?php  
require_once '../Model/Model.php';
session_start();
// $username=$_SESSION['uname'];
function fetchTransport($ReqTransportReg)
{
    return provideReqforProductTransport($ReqTransportReg);
}
?>