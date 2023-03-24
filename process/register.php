<?php

	if (!(trim($_POST["name"]) != "" && trim($_POST["surname"]) != "" && trim($_POST["patronymic"]) != "" &&
		trim($_POST["login"]) != "" && trim($_POST["password"]) != "" && trim($_POST["group"]) != ""))
	{
		header("Location: /auth.php");
	}

	// Подключаемся к базе
	$connection = mysqli_connect("localhost", "root", "root", "schedule");

	if (!$connection)
	{
	    die("Ошибка подключения: " . mysqli_connect_error());
	}

	// Экранируем
	$login = trim(mysqli_real_escape_string($connection, $_POST["login"]));
	$name = trim(mysqli_real_escape_string($connection, $_POST["name"]));
	$surname = trim(mysqli_real_escape_string($connection, $_POST["surname"]));
	$patronymic = trim(mysqli_real_escape_string($connection, $_POST["patronymic"]));
	$group = trim(mysqli_real_escape_string($connection, $_POST["group"]));
	$password = md5(trim(mysqli_real_escape_string($connection, $_POST["password"])));

	// Проверяем корректность логина и имени
	if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
	{
		echo "Недопустимая длина логина (минимум - 5 символов, максимум - 90)";
		exit();
	}
	else if(mb_strlen($group) > 5)
	{
		echo "Недопустимый размер номера группы (максимум - 5 символов)";
		exit();
	}
	else if(mb_strlen($password) < 5)
	{
		echo "Минимальный размер пароля - 5 символов";
		exit();
	}

	$result = $connection->query("SELECT * FROM `users` WHERE `login` = '$login'");
	$user = $result->fetch_assoc();

	// Если в базе есть юзер с таким логином, то ошибка
	if(!empty($user))
	{
		echo "Данный логин уже используется!";
		exit();
	}

	$result = $connection->query("INSERT INTO `users` (`name`, `surname`, `patronymic`, `login`, `group`, `password`) VALUES('$name', '$surname', '$patronymic', '$login', '$group', '$password')");
	$connection->close();

	header('Location: /auth.php');
	exit();
?>