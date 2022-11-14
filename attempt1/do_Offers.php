<?php
require('boot.php');
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user['username'];
}
if (isset($_POST['form-worker-submit'])) {
    $stmt = pdo()->prepare("INSERT INTO `clients` (`reg_number`, `surName`, `firstName`, `Patronymic`, `address`, `telephone`, `sex`, `education`, `paymentReceipt`, `requests`, `minSalary`, `townRegion`, `username`)
    VALUES (:reg_number, :surName, :firstName, :Patronymic, :address, :telephone, :sex, :education, :paymentReceipt, :requests, :minSalary, :townRegion, :username)");
    $stmt->execute([
        'username' => $username,
        'reg_number' => $_POST['reg_number'],
        'surName' => $_POST['surName'],
        'firstName' => $_POST['firstName'],
        'Patronymic' => $_POST['Patronymic'],
        'address' => $_POST['address'],
        'telephone' => $_POST['telephone'],
        'sex' => $_POST['sex'],
        'education' => $_POST['education'],
        'paymentReceipt' => $_POST['paymentReceipt'],
        'requests' => $_POST['requests'],
        'minSalary' => $_POST['minSalary'],
        'townRegion' => $_POST['townRegion'],
    ]);
}
if(isset($_POST['form-boss-submit'])){
    
}
