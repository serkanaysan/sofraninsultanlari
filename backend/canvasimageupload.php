<?php
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$strtotime = strtotime("now");
$filename = $_POST["id"].'_share';
$file = $_SERVER['DOCUMENT_ROOT'] . '/sofraninsultanlari/upload/'.$filename.'.png';

file_put_contents($file, $data);
?>