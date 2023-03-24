<?php
    if (isset($_COOKIE['user']) && isset($_COOKIE['group']))
    {
        header("Location: /my_schedule.php");
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Расписание Онлайн | Авторизация</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body style="background: #214a80;">
    <div class="login-dark" style="height: 695px;">
        <form method="POST" action="process/auth.php">
        	<div class="illustration"><i class="icon ion-ios-calendar-outline"></i></div>
        	<center><h3 class="">Расписание Онлайн</h3><center>
            <center><h4 class="">Авторизация</h4><center>
            <div class="form-group"><input class="form-control" type="text" name="login" placeholder="Логин"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Пароль"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Войти</button></div>
            <div class="form-group"><p>У вас нет профиля? Скорее <a href="/register.php">регистрируйся</a>!</p></div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>