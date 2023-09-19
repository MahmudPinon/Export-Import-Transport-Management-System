<?php  
require_once '../Model/Model.php';

function returnterminal($username)
{
    $res=modelreturnterminal($username);
    if($res==0)
    {
        return 0;
    }
    else
    {
        return $res;
    }
}

function returnexportproduct()
{
        $rows =reqregexportproduct();
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