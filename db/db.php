<?php
function initAndReturnDatabase(){
    $databaseConnection = new mysqli("localhost", "root", "", "denero_junior_test");
    if ($databaseConnection->connect_error){
        die("Connection filed, error: " . $databaseConnection->connect_error);
    }
    
    return $databaseConnection;
}
?>
