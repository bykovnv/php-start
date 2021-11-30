<?php
if(!isset($_SESSION)){
    session_start();
}
$db = new PDO('mysql:host=localhost;dbname=php-start;', 'php-start_usr', 'pqQn1C7FxQ7A1Vn6', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

$sql = "SELECT * from user_15";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll();

if(isset($_POST['btn_delete'])){
    $get_id = $_GET['id'];
    $sqlImg = "SELECT * FROM user_15 WHERE id = ?";
    $stm = $GLOBALS['db']->prepare($sqlImg);
    $stm->execute([$get_id]);
    $resultImg = $stm->fetch();

    $sql = "DELETE FROM user_15 WHERE id = ?";
    $query = $GLOBALS['db']->prepare($sql);
    $query->execute([$get_id]);
    $full_path = "img/uploads/" . $resultImg['img'];
    
    unlink($full_path);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}
?>
