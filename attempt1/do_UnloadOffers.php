<?php
require('boot.php');
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $username = $user['username'];
}
$stmt = pdo()->prepare("SELECT * FROM `offers`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->setFetchMode(PDO::FETCH_ASSOC);  

echo "<table class='table' style='border-spacing: 0px 0px; width: 100%; font-size: 18px;'>" .  "<thead class='thead-table'><tr><th scope='col' style='width: 150px; text-align: center;border-bottom: 2px solid black;'>" . "<h3>Номер</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Профессия</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Кол-во рабочих мест</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Зарплата</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Регион города</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Ограничения по полу</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Возраст</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Образование</h3>" .
"</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Пользователь</h3>" .
"</th><th scope='col' style='width: 90px; text-align: center; border-bottom: 2px solid black;'>" . "" .

"</th></tr></thead>";
echo "<form ><table style='width: 100%; border-spacing: 0px 0px;'>"; 
foreach($result as $row){
    echo
    "<tr><td>" .  "<input style='width: 150px;' name='id' type='text' readonly value='" . htmlspecialchars($row['id']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='profession' type='text' readonly value='" . htmlspecialchars($row['profession']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='countPlace' type='text' readonly value='" . htmlspecialchars($row['countPlace']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='salary' type='text' readonly value='" . htmlspecialchars($row['salary']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='townRegion' type='text' readonly value='" . htmlspecialchars($row['townRegion']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='restrictSex' type='text' readonly value='" . htmlspecialchars($row['restrictSex']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='age' type='text' readonly value='" . htmlspecialchars($row['age']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='education' type='text' readonly value='" . htmlspecialchars($row['education']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='user' type='text' readonly value='" . htmlspecialchars($row['user']) . "'" .
    "</td><td>" . "<button type='submit' name='subOffer' class='btn btn-primary'>Register</button>" .
    "</td></tr>";
}
echo "</table></form>";
if(isset($_POST['subOffer'])){
    $id = $_POST['id'];
    $completeOffer = 1; //1 - сделка согласована, 0 - не согласована
    $stmt = pdo()->prepare("UPDATE `offers` SET `completeOffer` = '$completeOffer' WHERE `id` = '$id'");
    $stmt->execute();
    //При выводе id будет браться всегда последняя запись из сгенерированной таблицы, т.к. у каждой строки одинаковый name='id'
    //Пытался сделать через name = 'id[]', но не смог автоматизировать запрос
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
