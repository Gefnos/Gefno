<?php
session_start();
function pdo(): PDO // Делаем глобально доступным подключение в БД
{
    static $pdo;
    if (!$pdo) {
        $config = include __DIR__ . '/config.php';
        // Подключение к БД
        $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo; 
}
//Функция проверки авторизации юзера
function check_auth() : bool{
    return (isset($_SESSION['user_id']));
}
//Функция для выскакивающих сообщений
function flash(?string $message = null){
    if ($message) {
        $_SESSION['flash'] = $message;    
    } else {
        if (!empty($_SESSION['flash'])) {?>
             <div class="alert-error">
                <?=$_SESSION['flash']?>
              </div>
          <?php }
          unset($_SESSION['flash']);
          $_SESSION['flash'] = '';
        }
        
}

?>
