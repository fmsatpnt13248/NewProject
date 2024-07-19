<?php

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $photoTmpPath = $_FILES['photo']['tmp_name'];
    $photoName = $_FILES['photo']['name'];
    $photoSize = $_FILES['photo']['size'];
    $photoType = $_FILES['photo']['type'];
    $photoExtension = pathinfo($photoName, PATHINFO_EXTENSION);

    $actualName = uniqid('', true);
    $uploadDir = '../img/';
    $uploadFilePath = $uploadDir . basename($actualName) . '.' . $photoExtension;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (move_uploaded_file($photoTmpPath, $uploadFilePath)) {
        move_uploaded_file($photoTmpPath, $uploadFilePath);
        $photoPath = $uploadFilePath;
    } else {
        $photoPath = '';
    }
    } else {
        $photoPath = '';
    }