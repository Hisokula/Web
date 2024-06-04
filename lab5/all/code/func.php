<?php
// функция для установки соединения с базой данных MySQL
function extracted()
{
    // параметры подключения к базе данных
    $hostname = 'db';
    $username = 'root';
    $password = 'helloworld';
    $database = 'web';
    $port = 3306;

    // создание нового подключения к MySQL
    $test = new mysqli($hostname, $username, $password);

    if (mysqli_connect_errno()) {
        // вывод сообщения об ошибке в случае неудачного подключения
        echo "<p>" . "Error! It's unable to connect to MySQL " . mysqli_connect_error() . "</p>";
    }
    // возврат объекта подключения
    return $test;
}
?>
