<?php
session_start();
require_once 'task_11_function.php';

$db = new PDO('mysql:host=localhost;dbname=php-start;', 'php-start_usr', 'pqQn1C7FxQ7A1Vn6', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_BCRYPT);
$params = [
	'email' => $GLOBALS['email'],
	'password' => $GLOBALS['hash'],
];
$user = get_user_by_email($email);

if ($user) {
	add_messagee('email_exist', 'Этот email занят');
	redirect_to('task_11.php');
	exit();
}

add_user($email, $hash);

add_message('register_success', 'Вы зарегестрированы');

redirect_to('task_11.php');
?>
