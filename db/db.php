<?php
/**
 * Connect to database and return connection
 * 
 * @throws Exception if there is an error durning connection
 *
 * @return mysql
 */
function initAndReturnDatabase(){
    $databaseConnection = new mysqli("localhost", "root", "", "denero_junior_test");
    if ($databaseConnection->connect_error){
        throw new Exception("Connection filed, error: " . $databaseConnection->connect_error);
    }
    
    return $databaseConnection;
}

/**
 * Perform sql query from second task
 *
 * @param mysqli $databaseConnection
 * @return mysqli_result
 */
function joinTask(mysqli $databaseConnection){
    $result = $databaseConnection->query("SELECT DISTINCT *  FROM users JOIN objects ON users.object_id = objects.id");
    return $result;
}
?>
