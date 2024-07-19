<?php

session_start();

if (!empty($_POST)) {
    include 'connection.php';
    $mySQLObject = new MySQLConnection();
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $checkboxState = isset($_POST['checkbox']) ? $_POST['checkbox'] : null;

    if (empty($name) || $name == null) {
        header("Location: ../edit_task.php?error=name_field");
        die();
    } else {
        try {
            $conn = $mySQLObject->mySQLConnect($conn);
            
            if (!empty($checkboxState) || $checkboxState != null) {
                include_once 'photo_upload.php';
                $conn->multi_query("UPDATE tasks SET name='" . $name . "',`description`='" . $description . "',`imgpath`='" . $photoPath . "' WHERE task_id =" . $id . "; SET @autoid := 0; UPDATE tasks SET task_id = (@autoid := @autoid + 1);");
            } else {
                $conn->multi_query("UPDATE tasks SET name='" . $name . "',`description`='" . $description . "' WHERE task_id =" . $id . "; SET @autoid := 0; UPDATE tasks SET task_id = (@autoid := @autoid + 1);");
            }
            
            
            session_unset();
            
            header("Location: ../index.php");
            unset($mySQLObject);
            die();
        } catch (PDOException $e) {
            echo("Query failed: " . $e);
        }
    }
} else {
    //echo '<p style="color:red; text-align:center;">POST method is empty!!</p>';
}
header("Location: ../edit_task.php");

