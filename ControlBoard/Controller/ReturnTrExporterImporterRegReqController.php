<?php 
    require_once '../Model/Model.php';
    function reqtransresreturn()
    {
        $rows =RegreqExporterImporter();
        if(empty($rows))
        {
            //echo "No Request";
        }
        else
        {
            return $rows;
        }
    }
    
 ?>