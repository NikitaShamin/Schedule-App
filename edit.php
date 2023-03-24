<?php
if (!isset($_COOKIE['user']) && !isset($_COOKIE['group']))
{
    header("Location: /auth.php");
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Расписание Онлайн | Мое расписание</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body style="background: #214a80;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Расписание Онлайн</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page">| </a>
              </li>
          </ul>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/edit.php">Редактировать</a>
          </li>
      </ul>
      <div class="navbar-text" style="left: 85%; position: relative;">
        <a href="process/exit.php">Выйти</a>
    </div>
</div>
</div>
</nav>
<center>
    <div class="mt-3 text-center card" style="width: 50%">
        <h2 class="pt-1">Редактирование расписания</h2>
        <form class="container" method="POST" action="process/update_schedule.php">
          <div class="mb-3 mt-3">
            <select class="form-select" name="is_numerator">
                <option selected>Выберите неделю</option>
                <option value="1">Числитель</option>
                <option value="0">Знаменатель</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="day">
                <option selected>Выберите день недели</option>
                <option value="0">Понедельник</option>
                <option value="1">Вторник</option>
                <option value="2">Среда</option>
                <option value="3">Четверг</option>
                <option value="4">Пятница</option>
                <option value="5">Суббота</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select" name="lesson_number">
                <option selected>Выберите время</option>
                <option value="0">08:10 - 09:45</option>
                <option value="1">09:55 - 11:30</option>
                <option value="2">11:40 - 13:15</option>
                <option value="3">13:35 - 15:10</option>
                <option value="4">15:20 - 16:55</option>
                <option value="5">17:05 - 18:40</option>
                <option value="6">18:50 - 20:15</option>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-select form-select-lg" name="type">
                <option selected>Выберите тип занятия</option>
                <option value="0">Лекция</option>
                <option value="1">Упражнение</option>
                <option value="2">Лабораторная работа</option>
            </select>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="is_four_hour">
            <label class="form-check-label" for="flexCheckDefault">
                4-ех часовое занятие
            </label>
        </div>
        <div class="mb-3">
            <label for="subjectInput" class="form-label">Название дисциплины</label>
            <input type="text" class="form-control" id="subjectInput" name="name">
        </div>
        <div class="mb-3">
            <label for="teacherInput" class="form-label">Преподаватель</label>
            <input type="text" class="form-control" id="teacherInput" name="teacher">
        </div>
        <div class="mb-3">
            <label for="roomInput" class="form-label">Аудитория</label>
            <input type="text" class="form-control" id="roomInput" name="room">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
</center>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>