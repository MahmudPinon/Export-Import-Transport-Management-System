<?php  
require_once '../Model/Model.php';
$terminalNames = TerminalNamesReturn();
if(!empty($terminalNames))
{
    header('Content-Type: application/json');
echo json_encode($terminalNames);
}

?>