<?php 
    require_once '../Model/Model.php';
    function reqexportreturn()
    {
        $rows =reqexportproduct();
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