<?php
require 'boot.php';
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user['username'];
}
$stmt = pdo()->prepare("SELECT * FROM `receipts` WHERE `username` = :username");
$stmt->execute(['username' => $username,]);
$isBuy = 0;
if (isset($_GET['saveReceipt'])) {
     if ($stmt->rowCount() > 0) {       
         echo "Вы уже оплатили регистрационный взнос";
         header('Location: index.php');
         die;
     } else {
        header('Location: index.php');
         $stmt = pdo()->prepare("INSERT INTO `receipts` (`date`, `cost`, `username`, `signedby`, `idReceipt`) VALUES (:date, :cost, :username, :signedby, :idReceipt)");
         $stmt->execute([
            'date' => $_GET['date'],
            'cost' => $_GET['cost'],
            'username' => $_GET['client'],
            'signedby' => $_GET['signedby'],
            'idReceipt' => $_GET['idReceipt'],
        ]);
        $isBuy = 1;
    }
}

