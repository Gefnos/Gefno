<?php
require_once __DIR__ . '/boot.php';
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
$profession = $_POST['profession'];
$salary = $_POST['salary'];
$townRegion = $_POST['townRegion'];
$restrictSex = $_POST['restrictSex'];
$age = $_POST['age'];
$education = $_POST['education'];
$countPlace = $_POST['countPlace'];
$username = $user['username'];

// //Добавим пользователя в базу
$stmt = pdo()->prepare(" INSERT INTO `offers` (`profession`, `countPlace`, `salary`, `townRegion`, `restrictSex`, `age`, `education`, `user`) VALUES ('$profession', '$countPlace', '$salary', '$townRegion', '$restrictSex', '$age', '$education', '$username')");
$stmt->execute();
header('Location: index.php');
