<?php 
	require 'db.php';

	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( $data['password']== $user->password )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div style="color:dreen;">Вы авторизованы!<br/> Можете перейти на <a href="/">главную</a> страницу.</div><hr>';
				?>
                <script>
                    window.location.replace('http://hatakon.ru.host1359716.serv41.hostland.pro');
                </script>
<?
			}else
			{
				$errors[] = 'Неверно введен пароль!';
			}

		}else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}
		
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
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


<form action="login.php" method="POST">
    <p>Авторизация</p>
    <div class="form-reg">
        <div class="pole_block">
	<label>Логин</label>
	<input type="text" name="login" value="<?php echo @$data['login']; ?>"><br/>
        </div>
        <div class="pole_block">
	<label>Пароль</label>
	<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>
        </div>
	<button type="submit" name="do_login" class="do_login">Войти</button>
    </div>
</form>
        </div>
    </div>

</body>
</html>