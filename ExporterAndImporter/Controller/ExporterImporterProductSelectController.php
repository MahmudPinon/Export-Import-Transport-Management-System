<?php  
require_once '../Model/Model.php';
$ProductNames = ProductNamesReturn();
if(!empty($ProductNames))
{
    header('Content-Type: application/json');
echo json_encode($ProductNames);
}

?>