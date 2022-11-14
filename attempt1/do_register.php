<?php
require_once __DIR__.'/boot.php';

// Проверим, не занято ли имя пользователя
$stmt = pdo()->prepare("SELECT * FROM `users` WHERE `username` = :username");
$stmt->execute(['username' => $_POST['username']]);
if ($stmt->rowCount() > 0) {
    echo "Ваш профиль уже зарегистрирован";
    die;
}

// Добавим пользователя в базу
$stmt = pdo()->prepare("INSERT INTO `users` (`username`, `password`) VALUES (:username, :password)");
$stmt->execute([
    'username' => $_POST['username'],
    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
]);

header('Location: login.php');
?>