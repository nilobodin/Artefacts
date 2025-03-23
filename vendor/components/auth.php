<?php
include "../functions/core.php";
$enter = '/';
include "header.php";
?>
<main class="main">
    <form action="../functions/auth.php" class="form form-auth" method="POST">
        <h2 class="form__title">
            Авторизация
        </h2>
        <section class="form__fields">
            <input type="text" name="login" class="input form__fields_field" placeholder="Логин">
            <input type="text" name="password" class="input form__fields_field" placeholder="Пароль">
        </section>
        <p class="error">
            <?php
            if(isset($_SESSION['error'])) {;
            echo ($_SESSION['error']);
            unset($_SESSION['error']);
            }?>
        </p>
        <section class="form__btns-links">
            <button class="btn form__btns-links_btn">
                Войти
            </button>
            <a href="reg.php" class="form__btns-links_link">Регистрация</a>
        </section>
    </form>
</main>
<?php include "footer.php" ?>