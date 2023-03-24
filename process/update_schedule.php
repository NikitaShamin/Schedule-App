<?php

	if (isset($_POST['is_numerator']) && strlen($_POST['is_numerator']) == 1)
	{
		$is_numerator = (int)$_POST['is_numerator'];

		if (!in_array($is_numerator, [0, 1])) die();
	}
	else die();

	if (isset($_POST['day']) && strlen($_POST['day']) == 1)
	{
		$day = (int)$_POST['day'];

		if (!in_array($day, [0, 1, 2, 3, 4, 5])) die();
	}
	else die();

	if (isset($_POST['lesson_number']) && strlen($_POST['lesson_number']) == 1)
	{
		$lesson_number = (int)$_POST['lesson_number'];

		if (!in_array($lesson_number, [0, 1, 2, 3, 4, 5, 6])) die();
	}
	else die();

	if (isset($_POST['type']) && strlen($_POST['type']) == 1)
	{
		$type = (int)$_POST['type'];

		if (!in_array($type, [0, 1, 2])) die();
	}
	else die();

	$is_four_hour = isset($_POST['is_four_hour']);

	if (isset($_POST['name']))
	{
		$name = $_POST['name'];
	}
	else die();

	if (isset($_POST['teacher']))
	{
		$teacher = $_POST['teacher'];
	}
	else die();

	if (isset($_POST['room']) && strlen($_POST['room']) < 10)
	{
		$room = $_POST['room'];
	}
	else die();

	// Подключаемся к базе
	$connection = mysqli_connect("localhost", "root", "root", "schedule");

	if (!$connection)
	{
		die("Ошибка подключения: " . mysqli_connect_error());
	}

	// Экранируем
	$name = trim(mysqli_real_escape_string($connection, $name));
	$teacher = trim(trim(mysqli_real_escape_string($connection, $teacher)));

	$group = $_COOKIE['group'];

	$low = $lesson_number - 1;
	$high = $lesson_number + 1;

	if ($low < 0) $low = 0;

	// Если 4-х часовое занятие
	if ($is_four_hour)
	{
		if ($lesson_number == 6) exit();

		$name = "4ч. " . $name;

		$result = $connection->query("DELETE FROM `schedule` WHERE `is_numerator` = '$is_numerator' AND `day` = '$day' AND `lesson_number` = '$lesson_number' OR `lesson_number` = '$low' OR `lesson_number` = '$high'");

		$result = $connection->query("INSERT INTO `schedule` (`name`, `day`, `lesson_number`, `is_numerator`, `type`, `is_four_hour`, `teacher`, `room`, `group`) VALUES('$name', '$day', '$lesson_number', '$is_numerator', '$type', '1', '$teacher', '$room', '$group')");

		$lesson_number += 1;

		$result = $connection->query("INSERT INTO `schedule` (`name`, `day`, `lesson_number`, `is_numerator`, `type`, `is_four_hour`, `teacher`, `room`, `group`) VALUES('$name', '$day', '$lesson_number', '$is_numerator', '$type', '1', '$teacher', '$room', '$group')");
	}
	else
	{
		$result = $connection->query("DELETE FROM `schedule` WHERE `is_numerator` = '$is_numerator' AND `day` = '$day' AND `is_four_hour` = '1' AND `lesson_number` = '$low' OR `lesson_number` = '$high'");

		$result = $connection->query("DELETE FROM `schedule` WHERE `is_numerator` = '$is_numerator' AND `day` = '$day' AND `lesson_number` = '$lesson_number'");

		$result = $connection->query("INSERT INTO `schedule` (`name`, `day`, `lesson_number`, `is_numerator`, `type`, `is_four_hour`, `teacher`, `room`, `group`) VALUES('$name', '$day', '$lesson_number', '$is_numerator', '$type', '0', '$teacher', '$room', '$group')");
	}

	$connection->close();
	header("Location: /my_schedule.php");

?>