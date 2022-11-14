<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
      <button type="submit" class="btn btn-primary">Сохранить</button>
  </div>
</form>
</body>
</html>