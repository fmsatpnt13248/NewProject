<?php

include 'connection.php';
$mySQLObject = new MySQLConnection();

$taskId = isset($_GET['id']) ? $_GET['id'] : 0;

try {
    $conn = $mySQLObject->mySQLConnect($conn);

    $conn->multi_query("DELETE FROM tasks WHERE task_id=" . $taskId . "; SET @autoid := 0; UPDATE tasks SET task_id = (@autoid := @autoid + 1);");

    header("Location: ../index.php");
    die();
} catch (PDOException $e) {
    echo("Query failed: " . $e);
}


