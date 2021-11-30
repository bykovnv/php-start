<?php
session_start();
require_once 'function_13.php';
$num = 1;
if (isset($_POST['btn'])){
  if (isset($_COOKIE['count'])){
    $num = $_COOKIE['count'] + 1;
  }
  setcookie('count', $num);
  add_message('btn', "Кнопка была нажата " . $num . " раз");
  redirect_to('task_13.php');
}

?>
