<?php 
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";


    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        // Connected successfully
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    return $conn;
}
