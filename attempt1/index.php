<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <?php
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    require_once __DIR__ . '/boot.php';

    $user = null;

    if (check_auth()) {
        // Получим данные пользователя по сохранённому идентификатору
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->execute(['id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $username = $user['username'];
    }

    ?>
    <?php if ($user) { ?>

        <h1>Добро пожаловать, <?= htmlspecialchars($user['username']) ?>!</h1>
        <a href="">Добавить предложение</a>
        <form action="#" method="get">
            <button type="submit" name="logout" id="logout" class="btn btn-primary w-25">Выйти</button>
            <? session_start();
            if (isset($_GET['logout'])) {
                session_destroy();
                header('location: Login.php');
            } ?>
        </form>
        <table space>

        </table>
        <script>
            document.getElementsByTagName("a")[0].onclick = () => {
                document.getElementById("listCrew").innerHTML +=
                    `       <div class="border border-success w-50 ">
                                    <form method="post" action="#">
                                        <div class="d-flex flex-wrap ">
                                            <div class="w-50 ">
                                                <div class="form-group">
                                                    <label for="profession">Профессия</label>
                                                    <input type="text" class="form-control" id="profession">
                                                </div>
                                                <div class="form-group">
                                                    <label for="countWorkPlace">Кол-во рабочих мест</label>
                                                    <input type="number" class="form-control" id="countWorkPlace">
                                                </div>
                                                <div class="form-group">
                                                    <label for="salary">Зарплата</label>
                                                    <input type="number" class="form-control" id="salary">
                                                </div>
                                            </div>

                                            <div class="w-50">
                                                <div class="form-group">
                                                    <label for="townRegion">Регион города</label>
                                                    <input type="text" class="form-control" id="townRegion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="restrictSex">Ограничение по полу</label>
                                                    <input type="text" class="form-control" id="restrictSex">
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Возраст</label>
                                                    <input type="number" class="form-control" id="age">
                                                </div>
                                            </div>
                                            <div class="w-100 d-flex justify-content-center">
                                                <div class="form-group w-50 ">
                                                    <label for="education">Образование</label>
                                                    <input type="text" class="form-control" id="education">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3 w-25">Предложить заявку</button>
                                    </form>
                                    <form action="WorkOffers.php" method="post">
                                        <button type="submit" class="btn btn-success mt-3 w-25">Выгрузить</button>
                                    </form>
                                </div>`;
                return false;
            };
        </script>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Регистрационный взнос</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="crew-tab" data-bs-toggle="tab" data-bs-target="#crew" type="button" role="tab" aria-controls="crew" aria-selected="false">Мои предложения</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Профиль</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="offers-tab" data-bs-toggle="tab" data-bs-target="#offers" type="button" role="tab" aria-controls="offers" aria-selected="false">Все заявки</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex w-100 mx-auto">
                    <!-- Кнопка-триггер модального окна -->
                    <div class="text-center mt-5 w-100">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Сформировать чек по оплате регистрационного взноса
                        </button>
                    </div>


                    <!-- Модальное окно -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Квитанция об оплате регистрационного взноса</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="w-75 border border-primary rounded-4 bg-light p-5 mx-auto" method="get" action="saveReceipt.php">
                                        <div class="form-group mb-3">
                                            <label for="cost" class="fs-3">Номер: </label>
                                            <input type="text" readonly class="form-control-plaintext" name="idReceipt" id="idReceipt" value="<? $idReceipt = '000' . rand(100000, 9999999);
                                                                                                                                                echo $idReceipt; ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="signedby" class="fs-3">Кем подписан: </label>
                                            <input type="text" readonly class="form-control-plaintext" name="signedby" id="signedby" value="Лопохова И.Р.">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="client" class="fs-3">Клиент: </label>
                                            <input type="text" readonly class="form-control-plaintext" name="client" id="client" value="<? echo $username ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="date" class="fs-3">Дата выдачи: </label>
                                            <input type="text" readonly class="form-control-plaintext" name="date" id="date" value="<? $curDate = date('Y-m-d');
                                                                                                                                    echo $curDate; ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cost" class="fs-3">Стоимость: </label>
                                            <input type="text" readonly class="form-control-plaintext" name="cost" id="cost" value="2499">
                                        </div>
                                        <div class="form-group mb-3 text-center">
                                            <button type="submit" name="saveReceipt" id="saveReceipt" class="btn btn-primary w-75">Сохранить чек</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="crew" role="tabpanel" aria-labelledby="crew-tab">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-crew-tab">
                        <div class="d-flex flex-wrap justify-content-around w-100 border border-primary" id="listCrew">
                            <div class="border border-success w-50">

                                <form method="post" action="sendOffer.php">
                                    <div class="d-flex flex-wrap ">
                                        <div class="w-50 ">
                                            <div class="form-group">
                                                <label for="profession">Профессия</label>
                                                <input type="text" class="form-control" id="profession" name="profession">
                                            </div>
                                            <div class="form-group">
                                                <label for="countPlace">Кол-во рабочих мест</label>
                                                <input type="number" class="form-control" id="countPlace" name="countPlace">
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Зарплата</label>
                                                <input type="number" class="form-control" id="salary" name="salary">
                                            </div>
                                        </div>

                                        <div class="w-50">
                                            <div class="form-group">
                                                <label for="townRegion">Регион города</label>
                                                <input type="text" class="form-control" id="townRegion" name="townRegion">
                                            </div>
                                            <div class="form-group">
                                                <label for="restrictSex">Ограничение по полу</label>
                                                <input type="text" class="form-control" id="restrictSex" name="restrictSex">
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Возраст</label>
                                                <input type="number" class="form-control" id="age" name="age">
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center">
                                            <div class="form-group w-50 ">
                                                <label for="education">Образование</label>
                                                <input type="text" class="form-control" id="education" name="education">
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" name="isWork" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Я ищу работу
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 w-25" name="btnSaveOffer" id="btnSaveOffer">Предложить заявку</button>
                                </form>
                                <form action="WorkOffers.php" method="post">
                                    <button type="submit" class="btn btn-success mt-3 w-25">Выгрузить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="for-container d-flex justify-content-around w-100">
                            <div class="for-worker w-50 text-center">
                                <h3>Профиль для работника:</h3>
                                <form class="form-worker row g-3" name="form-worker" id="form-worker" method="POST" action="do_Offers.php">

                                    <div class="col-md-6">
                                        <label for="reg_number" class="form-label">Регистрационный номер</label>
                                        <input type="text" readonly name="reg_number" class="reg_number form-control" id="reg_number" value="<?
                                                                                                                                                $stmt = pdo()->prepare("SELECT `idReceipt` FROM `receipts` WHERE `username` = :username");
                                                                                                                                                $stmt->execute(['username' => $username]);
                                                                                                                                                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                                                                                                $stmt->setFetchMode(PDO::FETCH_ASSOC);                                                                                                         echo $res[0]["idReceipt"]; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="surName" class="form-label">Фамилия</label>
                                        <input type="text" name="surName" class="surName form-control" id="surName" placeholder="Иванов...">
                                    </div>
                                    <div class="col-6">
                                        <label for="firstName" class="form-label">Имя</label>
                                        <input type="text" name="firstName" class="firstName form-control" id="firstName" placeholder="Иван...">
                                    </div>
                                    <div class="col-6">
                                        <label for="Patronymic" class="form-label">Отчество</label>
                                        <input type="text" name="Patronymic" class="Patronymic form-control" id="Patronymic" placeholder="Иванович...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Адресс</label>
                                        <input type="text" name="address" class="address form-control" id="address" placeholder="г. Камышин, д. 54, кв. 42...">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telephone" class="form-label">Телефон</label>
                                        <input type="number" name="telephone" class="telephone form-control" id="telephone" placeholder="89049867588...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="education" class="form-label">Образование</label>
                                        <input type="text" name="education" class="education form-control" id="education" placeholder="Среднее...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="paymentReceipt" class="form-label">Платежный счет</label>
                                        <input type="text" name="paymentReceipt" class="paymentReceipt form-control" id="paymentReceipt" placeholder="...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="requests" class="form-label">Желаемая должность</label>
                                        <input type="text" name="requests" class="requests form-control" id="requests" placeholder="Среднее...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="minSalary" class="form-label">Мин. зарплата</label>
                                        <input type="text" name="minSalary" class="minSalary form-control" id="minSalary" placeholder="Среднее...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="townRegion" class="form-label">регион города</label>
                                        <input type="text" name="townRegion" class="townRegion form-control" id="townRegion" placeholder="Среднее...">
                                    </div>

                                    <div class="col-12">
                                        <select name="sex" class="sex form-select" aria-label="Пример выбора по умолчанию" id="sex">
                                            <option selected value="0">Женщина</option>
                                            <option value="1">Мужчина</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="form-worker-submit" id="form-worker-submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>

                            <div class="for-boss w-50 text-center">
                                <h3>Профиль для работодателя:</h3>
                                <form class="form-worker row g-3" name="form-worker" id="form-worker" method="POST" action="do_Offers.php">

                                    <div class="col-md-6">
                                        <label for="titleFirm" class="form-label">Название фирмы</label>
                                        <input type="text" name="titleFirm" class="titleFirm form-control" id="titleFirm" placeholder="0007654...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="legalForm" class="form-label">Организационно-правовая форма</label>
                                        <input type="text" name="legalForm" class="legalForm form-control" id="legalForm" placeholder="Иванов...">
                                    </div>
                                    <div class="col-6">
                                        <label for="ownership" class="form-label">Форма собственности</label>
                                        <input type="text" name="ownership" class="ownership form-control" id="ownership" placeholder="Иван...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address" class="form-label">Адресс</label>
                                        <input type="text" name="address" class="address form-control" id="address" placeholder="г. Камышин, д. 54, кв. 42...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telephone" class="form-label">Телефон</label>
                                        <input type="number" name="telephone" class="telephone form-control" id="telephone" placeholder="89049867588...">
                                    </div>
                                    <div class="col-6">
                                        <label for="persInspector" class="form-label">Инспектор по кадрам</label>
                                        <input type="text" name="persInspector" class="persInspector form-control" id="persInspector" placeholder="Иванович...">
                                    </div>
                                    <div class="col-6">
                                        <label for="serviceBuy" class="form-label">Услуги по найму</label>
                                        <input type="text" name="serviceBuy" class="serviceBuy form-control" id="serviceBuy" placeholder="Иванович...">
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" name="form-boss-submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-offers" role="tabpanel" aria-labelledby="v-pills-offers-tab">
                        <form action="#" method="post" class="w-100">
                            <div class="d-flex w-100">
                                <select name="findIs" class="findIs form-select w-25" aria-label="Пример выбора по умолчанию" id="findIs">
                                    <option value="0">Ищу работника</option>
                                    <option value="1">Ищу работу</option>
                                    <option selected value="2">Все</option>
                                    <option value="3">Согласованные заявки</option>
                                </select>
                                <div class="d-flex">
                                    <button type="submit" name="btnFilters" class="btn btn-primary w-100">Сохранить</button>
                                    <?php
                                    if (isset($_POST['btnFilters'])) {
                                    }
                                    ?>
                                </div>
                            </div>

                        </form>
                        <?php
                        if (check_auth()) {
                            // Получим данные пользователя по сохранённому идентификатору
                            $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
                            $stmt->execute(['id' => $_SESSION['user_id']]);
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            $username = $user['username'];
                        }
                        $findIs = $_POST['findIs'];
                        switch ($findIs) {
                            case '0':
                                $stmt = pdo()->prepare("SELECT * FROM `offers` WHERE `isWork` = '1'");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                break;
                            case '1':
                                $stmt = pdo()->prepare("SELECT * FROM `offers` WHERE `isWork` = '0' ");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                break;
                            case '2':
                                $stmt = pdo()->prepare("SELECT * FROM `offers`");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                break;
                            case '3':
                                $stmt = pdo()->prepare("SELECT * FROM `offers` WHERE `completeOffer` = '1'");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                break;
                            default:
                                $stmt = pdo()->prepare("SELECT * FROM `offers`");
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                break;
                        }
                        echo "<table class='table' style='border-spacing: 0px 0px; width: 100%; font-size: 18px;'>" .  "<thead class='thead-table'><tr><th scope='col' style='width: 150px; text-align: center;border-bottom: 2px solid black;'>" . "<h3>Номер</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Профессия</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Кол-во рабочих мест</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Зарплата</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Регион города</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Ограничения по полу</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Возраст</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Образование</h3>" .
                            "</th><th scope='col' style='width: 150px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Пользователь</h3>" .
                            "</th><th scope='col' style='width: 90px; text-align: center; border-bottom: 2px solid black;'>" . "<h3>Работа</h3>" .
                            "</th></tr></thead>";

                        echo "<form method='POST'>";
                        $idStr;

                        for ($i = 0; $i < count($result); $i++) {

                            $resID = $result[$i]['id'];
                            $resid[$i] = $resID;
                            $resProfession = $result[$i]['profession'];
                            $resCountPlace = $result[$i]['countPlace'];
                            $resSalary = $result[$i]['salary'];
                            $resTownRegion = $result[$i]['townRegion'];
                            $resRestrictSex = $result[$i]['restrictSex'];
                            $resAge = $result[$i]['age'];
                            $resEducation = $result[$i]['education'];
                            $resUser = $result[$i]['user'];
                            $resIsWork = $result[$i]['isWork'];
                            $subOffer = 'subOffer';

                            if ($resIsWork == '1') {
                                $resIsWork = 'Работник';
                            } else {
                                $resIsWork = 'Работодатель';
                            }

                            echo
                            "<tr><td>"  . "<input style='width: 150px;' name='id' type='text' readonly value='" . htmlspecialchars($resID) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='profession' type='text' readonly value='" . htmlspecialchars($resProfession) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='countPlace' type='text' readonly value='" . htmlspecialchars($resCountPlace) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='salary' type='text' readonly value='" . htmlspecialchars($resSalary) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='townRegion' type='text' readonly value='" . htmlspecialchars($resTownRegion) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='restrictSex' type='text' readonly value='" . htmlspecialchars($resRestrictSex) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='age' type='text' readonly value='От " . htmlspecialchars($resAge) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='education' type='text' readonly value='" . htmlspecialchars($resEducation) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='user' type='text' readonly value='" . htmlspecialchars($resUser) . "'" .
                                "</td><td>" . "<input style='width: 150px;' name='isWork' type='text' readonly value='" . htmlspecialchars($resIsWork) . "'" .
                                "</td><td>" . "<button style='width: 150px' type='submit' onclick='respond($resID)' name='subOffer' value='' class='btn btn-primary'>Согласовать</button>" .
                                "</td></tr>";
                        }

                        echo "</table></form>";

                        ?>
                        <!-- <input type="text" id="hiddenTrade" value=""> -->
                        <script>
                            function respond(resID) {
                                let idHide = resID;
                                $.ajax({
                                    type: 'POST',
                                    url: 'do_Trade.php',
                                    data: {
                                        'idHide': idHide
                                    }
                                })
                                // alert(idHide);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    <?php } else { ?>

        <div class="main-container">
            <div class="container">
                <h1 class="text-center">Registration</h1>


                <form method="post" action="do_register.php" class="form-container">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a class="btn btn-outline-primary" href="Login.php">Login</a>
                    </div>

                </form>
            </div>
        </div>


    <?php } ?>



</body>

</html>