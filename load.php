<?php
include "config.php";
if (isset($_FILES['uploadFile'])) {
    $aws = new \app\aws\AwsS3();
    $response = $aws->uploadToS3($_FILES['uploadFile']['name'], $_FILES['uploadFile']['tmp_name'], 'uploads');
    echo '<a href="read.php?fileName=' . $response['file']['flname'] . '">Download' . '</a>';
    exit;
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadFile">
    <button type="submit">Upload</button>
</form>