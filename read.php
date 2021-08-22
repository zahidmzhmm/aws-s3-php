<?php
include "config.php";
if (isset($_GET['fileName'])) {
    $aws = new \app\aws\AwsS3();
    $response = $aws->readToS3('uploads', $_GET['fileName']);
}