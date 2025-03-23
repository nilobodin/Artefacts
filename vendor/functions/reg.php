<?php
require 'core.php';

if ($_POST) {
  $result = $link->query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}'");
  if ($result->num_rows != 0) {
    $_SESSION['error'] = "Пользователь с данным логином уже зарегистрирован";
    header("Location: /vendor/components/reg.php");
    exit;
  } else {
    $link->query("INSERT INTO `users`(
      `login`, 
      `password`, 
      `name`, 
      `email`) VALUES (
        '{$_POST['login']}',
        '{$_POST['password']}',
        '{$_POST['name']}',
        '{$_POST['email']}')");
    header('Location: /vendor/components/auth.php');
    exit;
  }
}
