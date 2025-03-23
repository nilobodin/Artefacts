<?php
require 'core.php';

if ($_POST) {
  $result = $link->query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' AND `password` = '{$_POST['password']}'");
  if ($result->num_rows > 0) {
    foreach ($result as $key => $value) {
      $_SESSION['user']['id'] = $value['id'];
      $_SESSION['user']['role'] = $value['role_id'];
      $_SESSION['user']['email'] = $value['email'];
      $_SESSION['user']['name'] = $value['name'];
      header("Location: /");
      exit;
    }
  } else {
    $_SESSION['error'] = 'Не верный логин или пароль';
    header("Location: /vendor/components/auth.php");
    exit;
  }
}