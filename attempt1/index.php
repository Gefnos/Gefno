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
    }

    ?>
    <?php if ($user) { ?>

        <h1>Добро пожаловать, <?= htmlspecialchars($user['username']) ?>!</h1>

        <!-- <form class="mt-5" method="post" action="do_logout.php"> -->
        <h2>Профиль</h2>
        <a href="">Нажать</a>

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
                                </div>`;
                return false;
            };
        </script>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Главная</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="crew-tab" data-bs-toggle="tab" data-bs-target="#crew" type="button" role="tab" aria-controls="crew" aria-selected="false">Мои предложения</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="offers-tab" data-bs-toggle="tab" data-bs-target="#offers" type="button" role="tab" aria-controls="offers" aria-selected="false">Заявки</button>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="d-flex justify-content-between">
                    <div class="date-container border border-success">
                        <div class="input-container">
                            <label for="titleShip" class="form-label">Название</label>
                            <input type="text" class="form-control" name="titleShip" id="inpEdit">
                        </div>
                        <div class="input-container">
                            <label for="Capacity" class="form-label">Грузоподъемность</label>
                            <input type="number" class="form-control" name="Capacity" id="inpEdit">
                        </div>
                        <div class="input-container">
                            <label for="Port" class="form-label">Порт прописки</label>
                            <input type="text" class="form-control" name="Port" id="inpEdit">
                        </div>
                        <div class="input-container">

                            <label for="Role" class="form-label">Судовая роль</label>
                            <input type="text" class="form-control" name="Role" id="inpEdit">
                        </div>
                        <div class="input-container">
                            <label for="Coordinates" class="form-label">Координаты</label>
                            <input type="boolval" class="form-control" name="Coordinates" id="inpEdit">
                            <small>Где 0 - в порте, 1 - в пути</small>
                        </div>
                        <div class="input-container">
                            <label for="dateRepair" class="form-label">Дата постановки на капитальный ремонт</label>
                            <input type="date" class="form-control mb-2" name="dateRepair" id="inpEdit">
                        </div>
                        <div class="input-container">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </div>

                    <div class="other-container">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/ship1.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Сборный груз</h5>
                                        <p>Все суда приспособлены для перевозки практически любых генеральных и навалочных грузов.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/ship2.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Сквозной сервис</h5>
                                        <p>Камышинское морское пароходство предоставляет услуги по доставке груза в контейнерах из Москвы на Дальний Восток.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/ship3.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Линейный перевозки</h5>
                                        <p>Миссия Камышинского морского пароходства - обеспечить всем необходимым жителей российских регионов, не имеющих постоянной устойчивой сухопутной связи с основной частью страны.</p>
                                    </div>
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
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 w-25">Предложить заявку</button>
                                </form>
                                <form action="WorkOffers.php" method="post">
                                    <button type="submit" class="btn btn-success mt-3 w-25">Выгрузить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-offers" role="tabpanel" aria-labelledby="v-pills-offers-tab">
                        <div class="for-container d-flex justify-content-around w-100">
                            <div class="for-worker w-50 text-center">
                                <h3>Профиль для работника:</h3>
                                <form class="form-worker row g-3" name="form-worker" id="form-worker" method="POST" action="do_Offers.php">

                                    <div class="col-md-6">
                                        <label for="reg_number" class="form-label">Регистрационный номер</label>
                                        <input type="text" name="reg_number" class="reg_number form-control" id="reg_number" placeholder="0007654...">
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
        </div>


        <!-- 
                
                                // for (var i = 0; i < 5; i++) {} // let currTime=new Date(); // var TimeShip=new Date(); // TimeShip.setSeconds(TimeShip.getSeconds() + 5); // $('.res').text((TimeShip.getHours() + ":" + TimeShip.getMinutes() + ":" + TimeShip.getSeconds())); // if (currTime> Tim)

                                    // var myTime = window.performance.now();
                                    // var _cont = $('.cont').text();
                                    // var _Seconds = $('.seconds').text(),
                                    // int;
                                    // int = setInterval(function() { // запускаем интервал
                                    // if (_Seconds > 0) {
                                    // _Seconds--; // вычитаем 1
                                    // $('.res').text(_Seconds); // выводим получившееся значение в блок
                                    // } else {
                                    // // clearInterval(int); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
                                    // $('.cont').text("43.7949, 028.6111");

                                    // // updateCoordinates();
                                    // i++;
                                    // }
                                    // }, 1000);
                        <div class="other-container">
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/crew1.webp" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Сборный груз</h5>
                                            <p>Все суда приспособлены для перевозки практически любых генеральных и навалочных грузов.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/crew2.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Сквозной сервис</h5>
                                            <p>Камышинское морское пароходство предоставляет услуги по доставке груза в контейнерах из Москвы на Дальний Восток.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/crew3.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>Линейный перевозки</h5>
                                            <p>Миссия Камышинского морского пароходства - обеспечить всем необходимым жителей российских регионов, не имеющих постоянной устойчивой сухопутной связи с основной частью страны.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> -->
        </div>
        </div>




        </div>



        <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <img class="d-block w-100" src="img/ship1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img class="d-block w-100" src="img/ship2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img class="d-block w-100" src="img/ship3.jpg" alt="Third slide">
                            </div>
                        </div>
                      
                    </div>
                </div>
                </div> -->





        <!-- <button type="submit" name="logout" class="btn btn-primary">Logout</button> -->
        <!-- </form> -->

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