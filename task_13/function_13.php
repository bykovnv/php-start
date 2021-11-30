<?php
session_start();
require_once 'hander_13.php';

function redirect_to($path){
  header('Location: ' . $path);
  
}

function add_message($key, $message) {
$_SESSION['_flash'][$key] = $message;
}

function show_message($key)
{
if (isset($_SESSION['_flash'][$key])) {
    echo $_SESSION['_flash'][$key];
}
} 
?>
