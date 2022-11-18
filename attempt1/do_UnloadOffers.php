<?php
require('boot.php');
$stmt = pdo()->prepare("SELECT * FROM `offers`");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result[1]);
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
echo "<form ><table style='width: 100%; border-spacing: 0px 0px;'>"; // start a table tag in the HTML
foreach($result as $row){
    echo
    "<tr><td>" .  "<input style='width: 150px;' name='id' type='text' disabled value='" . htmlspecialchars($row['id']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='profession' type='text' disabled value='" . htmlspecialchars($row['profession']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='countPlace' type='text' disabled value='" . htmlspecialchars($row['countPlace']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='salary' type='text' disabled value='" . htmlspecialchars($row['salary']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='townRegion' type='text' disabled value='" . htmlspecialchars($row['townRegion']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='restrictSex' type='text' disabled value='" . htmlspecialchars($row['restrictSex']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='age' type='text' disabled value='" . htmlspecialchars($row['age']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='education' type='text' disabled value='" . htmlspecialchars($row['education']) . "'" .
    "</td><td>" . "<input style='width: 150px;' name='user' type='text' disabled value='" . htmlspecialchars($row['user']) . "'" .
    "</td><td>" . "<button type='submit' name='subOffer' class='btn btn-primary'>Register</button>" .
    "</td></tr>";
}
echo "</table></form>";
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
