<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Мои вакансии</title>
</head>

<body>
    <?
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    require_once __DIR__ . '/boot.php';
    if (check_auth()) {
        // Получим данные пользователя по сохранённому идентификатору
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <h1>Добро пожаловать, <?= htmlspecialchars($user['username']) ?>!</h1>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">На главную</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="WorkOffers.php">Мои вакансии</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">Поиск работника</a>
        </li>
    </ul>
    <?php
    if (check_auth()) {
        // Получим данные пользователя по сохранённому идентификатору
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $user['username'];
    }
    $stmt = pdo()->prepare("SELECT * FROM `offers` WHERE `user`= '$username'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo "<table class='table' style='border-spacing: 0px 0px; font-size: 18px;'>" .  "<thead class='thead-table'><tr><th scope='col' style='width: 200px; text-align: center;border-bottom: 2px solid black;'>" . "<h3>Номер</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Профессия</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Кол-во рабочих мест</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Зарплата</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Регион города</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Ограничения по полу</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Возраст</h3>" .
        "</th><th scope='col' style='width: 200px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Образование</h3>" .
        "</th></tr></thead>";
    foreach ($result as $row) {
        echo
        "<tbody><tr style=''><th scope='row' style='border-bottom: 2px solid #f2f4f5; text-align: center; height: 50px;'>" . htmlspecialchars($row['id']) .
            "</th><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['profession']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['countPlace']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['salary']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['townRegion']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['restrictSex']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['age']) .
            "</td><td style='border-bottom: 2px solid #f2f4f5;text-align: center;'>" . htmlspecialchars($row['education']) .
            "</td></tr>
    </tbody>";
    }
    echo "</table>";
    ?>
</body>
</html>