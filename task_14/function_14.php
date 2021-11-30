<?php
if(!isset($_SESSION)){
    session_start();
}
require_once 'handler_14.php';
$db = new PDO('mysql:host=localhost;dbname=php-start;', 'php-start_usr', 'pqQn1C7FxQ7A1Vn6', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_BCRYPT);
$params = [
    "email" => $email,
    "password" => $password,
    "hash" => $hash
];
 
function get_user_by_email($email){
    $query = $GLOBALS['db']->prepare("SELECT * FROM users_11 WHERE email = ?");
    $query->execute(array($email));
    $result = $query->fetch();
    if (!$result) return false;
    return $result;
}
 

function login($email, $password)
{
    $user = get_user_by_email($email);
    if (!$user) {
        return false;
    }

    if (!password_verify($password, $user['password'])) {
        add_message('login_error', 'Пароль не верный');
        redirect_to('task_12.php');
        return false;
    }

    add_message('login_success', 'Авторизация успешна');

    $_SESSION['user'] = [
        'id' => $user['id'],
        'login' => $email,
    ];
    return true;
}
 


function add_message($key, $message){
    echo $_SESSION['_flash'][$key] = $message;
}

function show_message($key){
    if (isset($_SESSION['_flash'][$key])) {
        echo $_SESSION['_flash'][$key];
        unset($_SESSION['_flash'][$key]);
    }
}

function redirect_to($path){
    header ('Location: ' . $path); 
}
