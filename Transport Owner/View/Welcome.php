<?php
require_once '../Model/Model.php';
$username = $_POST['username'];
session_start();
$aprv=checkapprove($username);
if($aprv==NULL)
{
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request is UnderChecking Please Be petient</p>';
    
}
else if($aprv=="Yes")
{

    $getusertype=getusertype($username);
    echo $getusertype;
    if($getusertype=="transportowner")
    {
        $_SESSION['uname'] =$_POST["username"];
		$_SESSION['pass'] = $_POST['password'];
        header("Location:TranspoertWonerWorkstart.php");
    }
    else if($getusertype=="exporterimporter")
    {
        $_SESSION['uname'] =$_POST["username"];
		$_SESSION['pass'] = $_POST['password'];
        header("Location:../../ExporterAndImporter/View/ExporterAndImporterWorkStart.php");
    }
    else if($getusertype=="terminalowner")
    {
        $_SESSION['uname'] =$_POST["username"];
		$_SESSION['pass'] = $_POST['password'];
        header("Location:../../Terminal Owner/View/TerminalOwnerWorkStart.php");
        
    }
}

?>
