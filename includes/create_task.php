<?php

if (!empty($_POST)) {
    include 'connection.php';
    $mySQLObject = new MySQLConnection();
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    include_once 'photo_upload.php';

    if (empty($name) || $name == null) {
        header("Location: ../add_task.php?error=name_field");
        die();
    } else {
        try {
            $conn = $mySQLObject->mySQLConnect($conn);

            $conn->multi_query("INSERT INTO tasks (name, description, imgpath) VALUES ('" . $name . "', '" . $description . "', '" . $photoPath . "'); SET @autoid := 0; UPDATE tasks SET task_id = (@autoid := @autoid + 1);");

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
header("Location: ../add_task.php");
