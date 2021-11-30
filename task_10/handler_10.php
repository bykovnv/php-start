<?php
    session_start();
    require_once 'function_10.php';

    $text = $_POST['text'];

    $checkedText = get_text($text); 

    if ($checkedText) {
    set_flash_message('text_exist', 'Введенное значение уже присутствует в таблице');
    redirect_to('task_10.php');
    exit();
    }
    
    add_text($text);
    set_flash_message('text_sent', 'Сообщение отправлено.');
    redirect_to('task_10.php');


?>