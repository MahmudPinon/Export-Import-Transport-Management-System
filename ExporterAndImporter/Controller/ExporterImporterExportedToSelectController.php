<?php  
require_once '../Model/Model.php';
$CountryNames = CountryNamesReturn();
if(!empty($CountryNames))
{
    header('Content-Type: application/json');
echo json_encode($CountryNames);
}

?>