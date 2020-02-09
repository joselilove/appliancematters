<?php
if (isset($_FILES["file"]["type"])) {
    $data;
    $validextensions = array("jpeg", "jpg", "png", "gif");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    $tmp = explode(".", $_FILES["file"]["name"]);
    $extension = end($tmp);
    $newFileName = uniqid() . "." . $extension;
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/gif")) && ($_FILES["file"]["size"] < 1000000)
        && in_array($file_extension, $validextensions)
    ) {
        if ($_FILES["file"]["error"] > 0) {
            echo "failed";
        } else {
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "images/upload/" . $newFileName;
            move_uploaded_file($sourcePath, $targetPath);
            $data = [
                'id' => 'SUCCESS',
                'file' => $newFileName
            ];
        }
    } else {
        $data = 'failed';
    }
    echo json_encode($data);
}
