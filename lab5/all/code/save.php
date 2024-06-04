<?php
require_once __DIR__ . '/func.php';

if (empty($_POST['email'])) {
    // если 'email' пустое, возвращаем ошибку 404 и завершаем выполнение скрипта
    header("HTTP/1.1 404 Not Found");
    exit();
}

// создание массива для хранения данных из формы
$inputData = array();
$inputData[] = $_POST['email'];
$inputData[] = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$inputData[] = $_POST['description'];
$inputData[] = !empty($_POST['category']) ? $_POST['category'] : "other";

// подключение к базе данных
$db = extracted();

// выполнение SQL-запроса на вставку данных в таблицу 'web.ad'
$command = $db->query("INSERT INTO web.ad (email, title, description, category) VALUES ( '{$inputData[0]}', '{$inputData[1]}', '{$inputData[2]}', '{$inputData[3]}' )");

// перенаправление пользователя на главную страницу после сохранения данных
header('Location: /');
exit();
?>
