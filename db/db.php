<?php
function initAndReturnDatabase(){
    $databaseConnection = new mysqli("localhost", "root", "", "denero_junior_test");
    if ($databaseConnection->connect_error){
        die("Connection filed, error: " . $databaseConnection->connect_error);
    }
    
    return $databaseConnection;
}

function joinTask($databaseConnection){
    $databaseConnection->query("SELECT DISTINCT *  FROM users JOIN objects ON users.object_id = objects.id");
}
?>
