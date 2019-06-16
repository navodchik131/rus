<?php
require 'db.php';

$data = $_POST;

function captcha_show(){
    $questions = array(
        1 => 'Столица России',
        2 => 'Столица США',
        3 => '2 + 3',
        4 => '15 + 14',
        5 => '45 - 10',
        6 => '33 - 3'
    );
    $num = mt_rand( 1, count($questions) );
    $_SESSION['captcha'] = $num;
    echo $questions[$num];
}

//если кликнули на button
if ( isset($data['do_signup']) )
{
    // проверка формы на пустоту полей
    $errors = array();
    if ( trim($data['login']) == '' )
    {
        $errors[] = 'Введите логин';
    }

    if ( trim($data['email']) == '' )
    {
        $errors[] = 'Введите Email';
    }

    if ( $data['password'] == '' )
    {
        $errors[] = 'Введите пароль';
    }

    if ( $data['password_2'] != $data['password'] )
    {
        $errors[] = 'Повторный пароль введен не верно!';
    }

    //проверка на существование одинакового логина
    if ( R::count('users', "login = ?", array($data['login'])) > 0)
    {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }

    //проверка на существование одинакового email
    if ( R::count('users', "email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'Пользователь с таким Email уже существует!';
    }

    //проверка капчи
    $answers = array(
        1 => 'москва',
        2 => 'вашингтон',
        3 => '5',
        4 => '29',
        5 => '35',
        6 => '30'
    );
    if ( $_SESSION['captcha'] != array_search( mb_strtolower($_POST['captcha']), $answers ) )
    {
        $errors[] = 'Ответ на вопрос указан не верно!';
    }


    if ( empty($errors) )
    {
        //ошибок нет, теперь регистрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->ball = 10;
        R::store($user);
        echo '<div style="color:dreen;">Вы успешно зарегистрированы!<br><a href="/">На главную</a></div><hr>';
        ?>
        <script>
        window.location.replace('http://hatakon.ru.host1359716.serv41.hostland.pro');
        </script>
<?
    }else
    {
        echo '<div id="errors" style="color:red;">' .array_shift($errors). '</div><hr>';
    }

}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Руссификация - Сервис для интеграции иностранцев в культурную среду России!</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css" id="main-styles-link">


</head>
<body>

<div class="section-3">
    <div class="wrapper">

        <form action="signup.php" method="POST">
            <p>Регистрация</p>
            <div class="form-reg" ы>
                <div class="pole_block">
                    <label>Ваш логин</label>
                    <input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>
                </div>
                <div class="pole_block">
                    <label>Ваш Email</label>
                    <input type="email" name="email" value="<?php echo @$data['email']; ?>"><br/>
                </div>
                <div class="pole_block">
                    <label>Ваш пароль</label>
                    <input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>
                </div>
                <div class="pole_block">
                    <label>Пароль</label>
                    <input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"><br/>
                </div>
                <div class="pole_block">
                    <label><?php captcha_show(); ?></label>
                    <input type="text" name="captcha" ><br/>
                </div>


                <button type="submit" name="do_signup" class="do_login">Регистрация</button>
            </div>
        </form>

    </div>
</div>

</body>
</html>