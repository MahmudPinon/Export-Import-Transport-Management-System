<?php 
    require_once '../Model/Model.php';
    function reqimportprreturn()
    {
        $rows =reqimportproduct();
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