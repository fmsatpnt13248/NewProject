<?php

session_start();

include 'includes/connection.php';

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    
    $mySQLObject = new MySQLConnection();
    $result = $mySQLObject->mySQLSelect($result, $taskId);
    
    $userdata = [
        "id" => $taskId,
        "name" => $result['name'],
        "description" => $result['description']
    ];
    
    $_SESSION["user_data"] = $userdata;
    unset($mySQLObject);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        form {
            width: 300px;
            margin: 0 auto;
        }
        div {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid grey;
        }
        button {
            padding: 10px 15px;
            border: none;
            background-color: grey;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgrey;
        }
    </style>
</head>
<body>
    <h1>Edit Task</h1>
    <p style="color:red; text-align:center;"><i>* Name field is required</i></p>
    <form action="includes/update_task.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["user_data"]['id']); ?>">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_SESSION["user_data"]['name']); ?>">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description"><?php if ($_SESSION["user_data"]['description'] != null) echo htmlspecialchars($_SESSION["user_data"]['description']); ?></textarea>
        </div>
        <div>
            <label for="photo-checkbox">
                <input type="checkbox" id="photo_checkbox" name="checkbox" value="yes"> Edit photo?
            </label>
        </div>
        <div>
            <input type="file" id="photo_input" name="photo" disabled>
        </div>
        <div>
            <?php if (!empty($_GET['error'])) echo '<p style="color:red; text-align:center;">Name field is empty!!</p>';?>
            <button type="submit">Save</button>
        </div>
    </form>
    <script>
        document.getElementById('photo_checkbox').addEventListener('change', function() {
            var photoInput = document.getElementById('photo_input');
            photoInput.disabled = !this.checked;
        });
    </script>
</body>
</html>