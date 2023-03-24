<?php
	if (trim($_POST["login"]) != "" && trim($_POST["password"]) != "")
	{
		// Подключаемся к базе
		$connection = mysqli_connect("localhost", "root", "root", "schedule");

		if (!$connection)
		{
		    die("Ошибка подключения: " . mysqli_connect_error());
		}

		// Экранируем
		$login = trim(mysqli_real_escape_string($connection, $_POST["login"]));
		$password = md5(trim(mysqli_real_escape_string($connection, $_POST["password"])));

		$result = $connection->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
		$user = $result->fetch_assoc();

		// Делаем проверки на существование юзера в базе
		if ($user)
		{
			if(count($user) == 0)
			{
				echo "Такой пользователь не найден.";
				exit();
			}
			else if(count($user) == 1)
			{
				echo "Логин или пароль введены неверно";
				exit();
			}
		}
		else
		{
			echo "Такой пользователь не найден.";
			exit();
		}

		setcookie('user', $user['id'], time() + 3600, "/");
		setcookie('group', $user['group'], time() + 3600, "/");

		$connection->close();

		header("Location: /my_schedule.php");
	}
	else
	{
		header("Location: /auth.php");
	}
?>