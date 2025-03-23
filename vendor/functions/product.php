<?php
include 'core.php';

// Добавление карточки
if (isset($_POST['add-product'])) {
  if (isset($_FILES['img'])) {
    $files = $_FILES['img'];

    // Проверка типа файла
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($files['type'], $allowedTypes)) {
      $_SESSION['error'] = 'Недопустимый формат файла';
      header("Location: /vendor/components/admin.php");
      exit;
    }

    // Проверка размера файла
    $maxSize = 2 * 1024 * 1024; // 2 МБ
    if ($files['size'] > $maxSize) {
      $_SESSION['error'] = 'Файл слишком большой';
      header("Location: /vendor/components/admin.php");
      exit;
    }

    // Генерация уникального имени файла
    $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
    $newFileName = uniqid() . '.' . $extension;

    // Указание папки для загрузки (относительный путь)
    $uploaddir = __DIR__ . '/../../assets/img/uploads/'; // Путь относительно текущего файла

    // Проверка, существует ли папка, и создание, если нет
    if (!is_dir($uploaddir)) {
      mkdir($uploaddir, 0777, true); // Создаем папку, если её нет
    }

    // Перемещение файла
    if (move_uploaded_file($files['tmp_name'], $uploaddir . $newFileName)) {
      $_SESSION['success'] = 'Файл успешно загружен';

      // Сохранение ссылки в базу данных
      $filePath = '/assets/img/uploads/' . $newFileName; // Путь для сохранения в БД
      $link->query("INSERT INTO `products`( 
        `img`, 
        `title`, 
        `descriptions`) VALUES (
          '$filePath',
          '{$_POST['title']}',
          '{$_POST['description']}')");
      header("Location: /vendor/components/admin.php");
      exit;
    } else {
      $_SESSION['error'] = 'Ошибка загрузки файла';
      header("Location: /vendor/components/admin.php");
      exit;
    }
  }
}

// Обновление карточки
if (isset($_POST['update-product'])) {
  if (isset($_POST['update-product-select'])) {
    $productId = intval($_POST['update-product-select']);

    // Получаем текущий путь к изображению из базы данных
    $currentImgQuery = $link->query("SELECT `img` FROM `products` WHERE `id` = $productId");
    $currentImg = $currentImgQuery->fetch_assoc()['img'];

    // Если файл был загружен
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
      $files = $_FILES['img'];

      // Проверка типа файла
      $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!in_array($files['type'], $allowedTypes)) {
        $_SESSION['error'] = 'Недопустимый формат файла';
        header("Location: /vendor/components/admin.php");
        exit;
      }

      // Проверка размера файла
      $maxSize = 2 * 1024 * 1024; // 2 МБ
      if ($files['size'] > $maxSize) {
        $_SESSION['error'] = 'Файл слишком большой';
        header("Location: /vendor/components/admin.php");
        exit;
      }

      // Генерация уникального имени файла
      $extension = pathinfo($files['name'], PATHINFO_EXTENSION);
      $newFileName = uniqid() . '.' . $extension;

      // Указание папки для загрузки (относительный путь)
      $uploaddir = __DIR__ . '/../../assets/img/uploads/'; // Путь относительно текущего файла

      // Проверка, существует ли папка, и создание, если нет
      if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true); // Создаем папку, если её нет
      }

      // Перемещение файла
      if (move_uploaded_file($files['tmp_name'], $uploaddir . $newFileName)) {
        $_SESSION['success'] = 'Файл успешно загружен';

        $filePath = '/assets/img/uploads/' . $newFileName; // Путь для сохранения в БД
        $link->query("UPDATE `products` SET 
          `img`='$filePath',
          `title`='{$_POST['title']}',
          `descriptions`='{$_POST['description']}' 
          WHERE `id` = $productId");
        header("Location: /vendor/components/admin.php");
        exit;
      } else {
        $_SESSION['error'] = 'Ошибка загрузки файла';
        header("Location: /vendor/components/admin.php");
        exit;
      }
    } else {
      // Если файл не был загружен, используем текущий путь к изображению
      $link->query("UPDATE `products` SET 
        `title`='{$_POST['title']}',
        `descriptions`='{$_POST['description']}' 
        WHERE `id` = $productId");
      header("Location: /vendor/components/admin.php");
      exit;
    }
  }
}

// Удаление карточки
if (isset($_POST['delete-product'])) {
  if (isset($_POST['delete-product-select'])) {
    $productId = intval($_POST['delete-product-select']);
    echo $productId;

    $link->query("DELETE FROM `products` WHERE `id` = $productId");
    header("Location: /vendor/components/admin.php");
    exit;
  } else {
    $_SESSION['error'] = 'Выберите товар для удаления';
    header("Location: /vendor/components/admin.php");
    exit;
  }
}


