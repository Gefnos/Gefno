<?php
require('boot.php');
//берем переменную, созданную в ajax-запросе из глобального массива $_POST 
$idHide = $_POST['idHide'];
$completeOffer = 1; //1 - сделка согласована, 0 - не согласована
$stmt = pdo()->prepare("UPDATE `offers` SET `completeOffer` = '$completeOffer' WHERE `id` = '$idHide'");
$stmt->execute();

