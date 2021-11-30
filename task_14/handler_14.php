<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'function_14.php';

$checkedEmail = get_user_by_email($email);
if(!$checkedEmail){ 
    add_message('no_user', 'Такой email или пароль не существует');
    redirect_to('task_13.php');
    exit();
}

login($email, $password);

redirect_to('task_14_1.php');
?>