<?php 
$enter = '/';
include "header.php";
?>
<main class="main">
    <form action="" class="form form-auth" method="POST">
        <h2 class="form__title">
            Авторизация
        </h2>
        <section class="form__fields">
            <input type="text" class="input form__fields_field" placeholder="Email">
            <input type="text" class="input form__fields_field" placeholder="Пароль">
        </section>
        <section class="form__btns-links">
            <button class="btn form__btns-links_btn">
                Войти
            </button>
            <a href="reg.php" class="form__btns-links_link">Регистрация</a>
        </section>
    </form>
</main>
<?php include "footer.php" ?>