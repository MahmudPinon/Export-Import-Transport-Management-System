<?php  
require_once '../Controller/CheckTerminalApprovalStatusController.php';
session_start();
$username = $_SESSION['uname'];
$res=checkstatus1($username);
if ($res == 0) {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">You Have Not Requested for Any Kind of Registered Terminal</p>';
    echo '<div style="text-align:center;">';
    echo '<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; display:inline-block;" onclick="location.href=\'TerminalOwnerWorkStart.php\'">Home</button>';
    echo '</div>';
}
else if ($res == NULL) {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request is Under Checking Please Be Patient</p>';
    echo '<div style="text-align:center;">';
    echo '<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; display:inline-block;" onclick="location.href=\'TerminalOwnerWorkStart.php\'">Home</button>';
    echo '</div>';
}
else if ($res == 'No') {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request Has been Rejected</p>';
    echo '<div style="text-align:center;">';
    echo '<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; display:inline-block;" onclick="location.href=\'TerminalOwnerWorkStart.php\'">Home</button>';
    echo '</div>';
}
else if ($res == 'Yes') {
    echo '<p style="text-align:center; font-weight:bold; color:green; font-size:40px;">Your Request Has been Approved</p>';
    echo '<div style="text-align:center;">';
    echo '<button type="button" style="background-color: gray; padding: 10px 20px; font-size: 16px; display:inline-block;" onclick="location.href=\'TerminalOwnerWorkStart.php\'">Home</button>';
    echo '</div>';
}
?>

