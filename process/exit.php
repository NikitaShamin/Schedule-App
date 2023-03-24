<?php
	setcookie('user', 0, time() - 3600, "/");
	setcookie('group', 0, time() - 3600, "/");

	header("Location: /index.php");
?>