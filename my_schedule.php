<?php
    if (!isset($_COOKIE['user']) && !isset($_COOKIE['group']))
    {
        header("Location: /auth.php");
    }

    $connection = mysqli_connect("localhost", "root", "root", "schedule");

    if (!$connection)
    {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    $group = $_COOKIE['group'];
    $result = $connection->query("SELECT * FROM `schedule` WHERE `group` = '$group'");

    $schedule = [];
    while ($row = $result->fetch_object())
    {
        $type = "";
        if ($row->type == 0) $type = "Лек. ";
        if ($row->type == 1) $type = "Упр. ";
        if ($row->type == 2) $type = "Лаб. ";

        $schedule[$row->is_numerator][$row->day][$row->lesson_number] = [
            'name' => $type . $row->name,
            'is_four_hour' => $row->is_four_hour,
            'teacher' => $row->teacher,
            'room' => "ауд. " . $row->room
        ];
    }

    $connection->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Расписание Онлайн | Мое расписание</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/auth.css">
    <link rel="stylesheet" href="css/my_schedule.css">
</head>

<body style="background: #214a80;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Расписание Онлайн</a>
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

<div class="table-container">
    <div class="text-center">
        <h2 class="pt-1" style="color: white;">Числитель</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="schedule-table">
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th>День недели</th>
                            <th>08:10 - 09:45</th>
                            <th>09:55 - 11:30</th>
                            <th>11:40 - 13:15</th>
                            <th>13:35 - 15:10</th>
                            <th>15:20 - 16:55</th>
                            <th>17:05 - 18:40</th>
                            <th class="last">18:50 - 20:15</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day">Понедельник</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][0][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][0][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][0][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Вторник</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][1][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][1][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][1][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Среда</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][2][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][2][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][2][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Четверг</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][3][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][3][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][3][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Пятница</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][4][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][4][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][4][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Суббота</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[1][5][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[1][5][$i]['room']; ?></p>
                                    <p><?php echo $schedule[1][5][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="table-container">
    <div class="text-center">
        <h2 class="pt-1" style="color: white;">Знаменатель</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="schedule-table">
                <table class="table bg-white">
                    <thead>
                        <tr>
                            <th>День недели</th>
                            <th>08:10 - 09:45</th>
                            <th>09:55 - 11:30</th>
                            <th>11:40 - 13:15</th>
                            <th>13:35 - 15:10</th>
                            <th>15:20 - 16:55</th>
                            <th>17:05 - 18:40</th>
                            <th class="last">18:50 - 20:15</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day">Понедельник</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][0][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][0][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][0][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Вторник</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][1][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][1][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][1][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Среда</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][2][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][2][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][2][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Четверг</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][3][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][3][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][3][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Пятница</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][4][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][4][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][4][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                        <tr>
                            <td class="day">Суббота</td>
                            <?php for($i = 0; $i < 7; $i++): ?>
                                <td class="active">
                                    <h4><?php echo $schedule[0][5][$i]['name']; ?></h4>
                                    <p><?php echo $schedule[0][5][$i]['room']; ?></p>
                                    <p><?php echo $schedule[0][5][$i]['teacher']; ?></p>
                                </td>
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>