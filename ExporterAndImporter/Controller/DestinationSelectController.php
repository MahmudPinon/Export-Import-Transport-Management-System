<?php  
require_once '../Model/Model.php';
$DestrictNames = DestrictNamesReturn();
if(!empty($DestrictNames))
{
    header('Content-Type: application/json');
echo json_encode($DestrictNames);
}

?>