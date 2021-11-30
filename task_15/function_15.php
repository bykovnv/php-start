<?php
if(!isset($_SESSION)){
    session_start();
}

$db = new PDO('mysql:host=localhost;dbname=php-start;', 'php-start_usr', 'pqQn1C7FxQ7A1Vn6', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

if(!isset($_FILES['image']['name'])){
    $name = null;
    $tmpName = null;
}
    else{
    $name = $_FILES['image']['name'];    
    $tmpName = $_FILES['image']['tmp_name'];
}

$sql = "SELECT * from user_15";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll();
?>
