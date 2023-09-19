<?php 
    require_once '../Model/Model.php';
    function reqterminalreg()
    {
        $rows =RegReqTerminals();
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