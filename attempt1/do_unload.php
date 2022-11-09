<?php
require_once __DIR__ . '/boot.php';
$_dateSubmit = date('Y-m-d h:i:s');

    $stmt = pdo()->prepare("INSERT INTO `datestore` (`_dateSubmit`, `empty`) VALUES (:_dateSubmit, :empty)");
    $stmt->execute([
        '_dateSubmit' => $_dateSubmit,
        'empty' => 'NULL',
    ]);
    header('Location: index.php');



