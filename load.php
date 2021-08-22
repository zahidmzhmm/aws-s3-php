<?php
include "config.php";
if (isset($_FILES['uploadFile'])) {
    $upload = new \app\aws\Upload();
    $response = $upload->uploadToS3($_FILES['uploadFile']['name'], $_FILES['uploadFile']['tmp_name'], 'uploads');
    echo '<pre>';
    var_dump($response);
    echo '</pre>';
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="uploadFile">
    <button type="submit">Upload</button>
</form>