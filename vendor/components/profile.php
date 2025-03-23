<?php
include "../functions/core.php";
$enter = '/';
include "header.php";
?>

<main class="main">
    <section class="main__profile">
        <div class="main__profile_wrapper">
            <img src="/assets/img/uploads/user_default.png" alt="Аватар пользователя" class="main__profile_avatar">
            <div class="main__profile_info">
                <p class="profile__info_name">Имя: <?= $_SESSION['user']['name']?></p>
                <p class="profile__info_email">Эл.почта: <?= $_SESSION['user']['email']?></p>
                <p class="profile__info_role">
                <? 
                if ($_SESSION['user']['role'] == 1) 
                { 
                    echo 'Пользователь';
                } 
                else 
                { 
                    echo 'Администратор'; 
                } ?></p>
            </div>
        </div>
    </section>
</main>

<?php include "footer.php" ?>