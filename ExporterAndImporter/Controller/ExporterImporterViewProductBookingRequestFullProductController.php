<?php  
require_once '../Model/Model.php';
// $username=$_SESSION['uname'];
function fetchProductDetails($productid)
{
    return provideReqforFullProduct($productid);
}
?>