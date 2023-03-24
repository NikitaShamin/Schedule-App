<?php
    if (isset($_COOKIE['user']))
    {
        header("Location: my_schedule.php");
    }
    else
    {
        header("Location: auth.php");
    }
?>