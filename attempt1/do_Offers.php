<?php
require('boot.php');
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user['username'];
    echo $username;
}
//отправка формы с данными рабочего
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
//отправка формы с данными работодателя
if(isset($_POST['form-boss-submit'])){
    $stmt = pdo()->prepare("INSERT INTO `bosses` (`titleFirm`,`legalForm`,`ownership`,`address`,`telephone`,`persInspector`,`serviceBuy`,`username`)
    VALUES (:titleFirm,:legalForm,:ownership,:address,:telephone,:persInspector,:serviceBuy,:username)");
    $stmt->execute([
        'username' => $username,
        'titleFirm' => $_POST['titleFirm'],
        'legalForm' => $_POST['legalForm'],
        'ownership' => $_POST['ownership'],
        'address' => $_POST['address'],
        'telephone' => $_POST['telephone'],
        'persInspector' => $_POST['persInspector'],
        'serviceBuy' => $_POST['serviceBuy'],
    ]);
}
