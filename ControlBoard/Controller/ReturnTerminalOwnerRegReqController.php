<?php 
    require_once '../Model/Model.php';
    function reqtermnlresreturn()
    {
        $rows =RegreqTerminalOwner();
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