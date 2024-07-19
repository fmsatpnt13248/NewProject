<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Task List</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php include_once 'includes/table.php';?>
        </tbody>
    </table>
    <div class="add-button-container">
        <a href="add_task.php" class="button-link">Add</a>
    </div>
</body>
</html>