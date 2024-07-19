<?php

require_once 'includes/connection.php';
$mySQLObject = new MySQLConnection();

$id = 1;
$maxId = $mySQLObject->mySQLGetMaxID($maxId);
$result = $mySQLObject->mySQLSelect($result, $id);

if (empty($result)) {
    echo '<h3>The list is empty</h3>';
} else {
    for ($id = 1; $id <= $maxId; $id++) {
        $result = $mySQLObject->mySQLSelect($result, $id);
        if ($result["imgpath"] != "") {
            echo '<tr>
            <td>' . htmlspecialchars($result["name"]) . '</td>
            <td>' . htmlspecialchars($result["description"]) . '</td>
            <td><a href="' . htmlspecialchars($result["imgpath"]) . '" target="_blank"><img src="' . htmlspecialchars($result["imgpath"]) . '" alt="No Photo" width="50"></a></td>
            <td>' . htmlspecialchars($result["date_created"]) . '</td>
            <td class="button-container">
                <a href="edit_task.php?id=' . $id . '" class="button-link">Edit</a>
                <a href="includes/delete_task.php?id=' . $id . '" class="button-link">Delete</a>
            </td>
            </tr>';
        } else {
            echo '<tr>
                    <td>' . htmlspecialchars($result["name"]) . '</td>
                    <td>' . htmlspecialchars($result["description"]) . '</td>
                    <td>No Image</td>
                    <td>' . htmlspecialchars($result["date_created"]) . '</td>
                    <td class="button-container">
                        <a href="edit_task.php?id=' . $id . '" class="button-link">Edit</a>
                        <a href="includes/delete_task.php?id=' . $id . '" class="button-link">Delete</a>
                    </td>
                    </tr>';
        }
    }
}
