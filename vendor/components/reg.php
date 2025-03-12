<?php 
$enter = '/';
include "header.php";
?>
<main class="main">
    <form action="" class="form form-reg" method="POST">
        <h2 class="form__title">
            Регистрация
        </h2>
        <section class="form__fields">
            <input type="text" class="input form__fields_field" placeholder="Логин">
            <input type="text" class="input form__fields_field" placeholder="Пароль">
            <input type="text" class="input form__fields_field" placeholder="Имя">
            <input type="text" class="input form__fields_field" placeholder="Email">
        </section>
        <section class="form__btns-links">
            <button class="btn form__btns-links_btn">
                Зарегистрироваться
            </button>
            <a href="auth.php" class="form__btns-links_link">Войти</a>
        </section>
    </form>
</main>
<?php include "footer.php" ?>