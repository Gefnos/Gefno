<?php
require_once __DIR__ . '/boot.php';
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (isset($_POST['btnSaveOffer'])) {
    $isWork = $_POST['isWork'];
    if($isWork == 'on'){
        $isWork = 1;
    }
    else{
        $isWork = 0;
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
    $stmt = pdo()->prepare("INSERT INTO `offers` (`profession`, `countPlace`, `salary`, `townRegion`, `restrictSex`, `age`, `education`, `user`, `isWork`) VALUES ('$profession', '$countPlace', '$salary', '$townRegion', '$restrictSex', '$age', '$education', '$username', '$isWork')");
    $stmt->execute();
    header('Location: index.php');
}
