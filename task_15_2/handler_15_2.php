<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'function_15_2.php';

$images = $_FILES['image'];
$arrImages = [];

foreach ($images as $key_name => $value) {
    foreach ($value as $key => $item) {
        $arrImages[$key][$key_name] = $item;
    }
}

foreach($arrImages as $image){
    $ext = pathinfo($image['name'], 4);
    $filename = uniqid() . "." . $ext;
    move_uploaded_file($image['tmp_name'], "img/uploads/" . $filename); 
    $sql = "INSERT user_15 (img) VALUES (:img)";
    $query = $GLOBALS['db']->prepare($sql);
    $param = ["img" => $filename];
    $query->execute($param); 
    header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>