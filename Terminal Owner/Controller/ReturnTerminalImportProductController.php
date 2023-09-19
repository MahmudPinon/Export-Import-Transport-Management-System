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

function returnImportproduct()
{
        $rows =reqregimportproduct();
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