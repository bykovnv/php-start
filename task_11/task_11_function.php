<?php 
 
function get_user_by_email($email){
    $statement = $GLOBALS['db']->prepare("SELECT * FROM users_11 WHERE email = ?");
    $statement->execute(array($email));
    $result = $statement->fetch();
    if (!$result) return false;
    return $result;
}
function add_user($email, $hash){
    $sql = "INSERT INTO users_11 (email, password) VALUES (:email, :password)";
    $query = $GLOBALS['db']->prepare($sql);
    $query->execute($GLOBALS['params']); 
}

function add_message($key, $message) {
    $_SESSION['_flash'][$key] = $message;
}

function show_message($key)
{
    if (isset($_SESSION['_flash'][$key])) {
        echo $_SESSION['_flash'][$key];
        unset($_SESSION['_flash'][$key]);
    }
}

function redirect_to($path){
    header('Location: ' . $path); 
    exit(); 
}
?>