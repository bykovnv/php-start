<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'function_15.php';

$filename = uploadsImg($_FILES['image']);

function uploadsImg($image){
    $ext = pathinfo($image['name'], 4);
    $filename = uniqid() . "." . $ext;
    move_uploaded_file($_FILES['image']['tmp_name'], "img/uploads/" . $filename); 
    return $filename;
}

function add_img($name){
    $sql = "INSERT user_15 (img) VALUES (:img)";
    $query = $GLOBALS['db']->prepare($sql);
    $param = ["img" => $GLOBALS['filename']];
    $query->execute($param); 
} 

uploadsImg($images);
add_img();
header('Location: '. $_SERVER['HTTP_REFERER']);
?>