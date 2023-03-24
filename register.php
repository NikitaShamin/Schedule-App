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
    <title>Расписание Онлайн | Регистрация</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body style="background: #214a80;">
    <div class="login-dark" style="height: 900px;">
        <form method="POST" action="process/register.php">
        	<div class="illustration"><i class="icon ion-ios-calendar-outline"></i></div>
        	<center><h3 class="">Расписание Онлайн</h3><center>
            <center><h4 class="">Регистрация</h4><center>
            <div class="form-group"><input class="form-control" type="text" name="login" placeholder="Логин"></div>
            <div class="form-group"><input class="form-control" type="text" name="surname" placeholder="Фамилия"></div>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Имя"></div>
            <div class="form-group"><input class="form-control" type="text" name="patronymic" placeholder="Отчество"></div>
            <div class="form-group"><input class="form-control" type="text" name="group" placeholder="Группа"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Пароль"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Зарегистрироваться</button></div>
            <div class="form-group"><p>У вас уже есть профиль? Скорее <a href="/auth.php">заходи</a>!</p></div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>