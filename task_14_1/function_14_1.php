<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['btn'])){
    unset($_SESSION['user']);
    header('Location: ' . 'task_14.php');
}

?>