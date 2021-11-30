<?php
    session_start();

    $db = new PDO('mysql:host=localhost;dbname=php-start;', 'php-start_usr', 'pqQn1C7FxQ7A1Vn6', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    
    function add_text($text){
    $sql = "INSERT task_9 (text) VALUES (:text)";
    $query = $GLOBALS['db']->prepare($sql);
    $params = ["text" => $text];
    $query->execute($params); 
    }
    
    function set_flash_message($key, $message) {
        $_SESSION['_flash'][$key] = $message;
    }
    
    function display_flash_message($key)
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