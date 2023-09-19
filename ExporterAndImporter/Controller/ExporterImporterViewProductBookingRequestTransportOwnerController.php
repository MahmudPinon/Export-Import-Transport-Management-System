<?php  
require_once '../Model/Model.php';
// $username=$_SESSION['uname'];
function fetchTransportOwner($reqtransportOwnerUsername)
{
    return provideReqforProductTransportOwner($reqtransportOwnerUsername);
}
?>