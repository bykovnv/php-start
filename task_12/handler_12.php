<?php
    session_start();
    require_once 'function_10.php';

    $text = $_POST['text'];
    $_SESSION['name']= $text;
    add_text($text);
    set_flash_message('text_sent', '$text');
    redirect_to('task_12.php');


?>