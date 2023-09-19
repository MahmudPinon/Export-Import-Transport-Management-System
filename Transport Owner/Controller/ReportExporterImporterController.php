<?php  
require_once '../Model/Model.php';
$ExporterImporterCorpName = CorpNameNamesReturn();
if(!empty($ExporterImporterCorpName))
{
    header('Content-Type: application/json');
echo json_encode($ExporterImporterCorpName);
}

?>