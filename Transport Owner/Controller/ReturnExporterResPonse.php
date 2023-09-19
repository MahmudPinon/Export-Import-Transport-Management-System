<?php
require_once '../Model/Model.php';
session_start();
function seeresponse()
{
    return exporterimporteresponse($_SESSION['uname']);
}

?>