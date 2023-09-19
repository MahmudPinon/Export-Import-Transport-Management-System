<?php  
require_once '../Model/Model.php';
session_start();
$username=$_SESSION['uname'];
function fetchPerson($username)
{
    return provideindividualinfo($username);
}
?>