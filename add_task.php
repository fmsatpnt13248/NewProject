<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
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
    <h1>Add Task</h1>
    <p style="color:red; text-align:center;"><i>* Name field is required</i></p>
    <form action="includes/create_task.php" enctype="multipart/form-data" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" value=""></textarea>
        </div>
        <div>
            <label for="photo_input">Photo</label>
            <input type="file" id="photo_input" name="photo">
        </div>
        <div>
            <?php if (!empty($_GET['error'])) echo '<p style="color:red; text-align:center;">Name field is empty!!</p>';?>
            <button type="submit">Save</button>
        </div>
    </form>
</body>
</html>