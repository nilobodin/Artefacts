<?php
include "../functions/core.php";
$enter = '/';
include "header.php";
?>
<main class="main">
    <form action="/vendor/functions/reg.php" class="form form-reg" method="POST">
        <h2 class="form__title">
            Регистрация
        </h2>
        <section class="form__fields">
            <input type="text" name="login" class="input form__fields_field" placeholder="Логин">
            <input type="text" name="password" minlength="6" class="input form__fields_field" placeholder="Пароль">
            <input type="text" name="name" class="input form__fields_field" placeholder="Имя">
            <input type="email" name="email" class="input form__fields_field" placeholder="Email">
        </section>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <section class="form__btns-links">
            <button class="btn form__btns-links_btn">
                Зарегистрироваться
            </button>
            <a href="auth.php" class="form__btns-links_link">Войти</a>
        </section>
    </form>
</main>
<?php include "footer.php" ?>
