<?php
include "../functions/core.php";
$enter = '/';
include "header.php";
$products = $link->query("SELECT * FROM `products`");
?>

<main class="main">
    <section class="admin-panel">
        <div class="admin-panel__wrapper">
            <form class="admin-panel__add-product" id="add-form" method="POST" enctype="multipart/form-data"
                action="../functions/product.php">
                <p class="admin-panel__add-product_img">
                <h2 class="admin-panel__add-product_title">Добавить товар</h2>
                <label class="admin-panel__add-product_label" for="img">Изображение товара</label>
                </p>
                <input class="admin-panel__add-product_field" name="img" type="file"></input>
                <input class="admin-panel__add-product_field" name="title" type="text"
                    placeholder="Название товара"></input>
                <textarea class="admin-panel__add-product_textarea" name="description" id=""
                    placeholder="Описание товара...."></textarea>
                <button class="admin-panel__add-product_btn" name="add-product">Добавить</button>
            </form>
            <form class="admin-panel__add-product" id="delete-form" method="POST"
                action="/vendor/functions/product.php">
                <h2 class="admin-panel__add-product_title">Удалить товар</h2>
                <select name="delete-product-select" class="admin-panel__add-product_field">
                    <?php foreach ($products as $product) { ?>
                        <option value="<?= $product['id'] ?>">
                            <?= $product['title'] ?>
                        </option>
                    <?php } ?>
                </select>
                <button class="admin-panel__add-product_btn" name="delete-product">Удалить</button>
            </form>
            <form class="admin-panel__add-product" id="update-form" method="POST" enctype="multipart/form-data"
                action="../functions/product.php">
                <h2 class="admin-panel__add-product_title">Обновить товар</h2>
                <select name="update-product-select" class="admin-panel__add-product_field">
                    <?php foreach ($products as $product) { ?>
                        <option value="<?= $product["id"] ?>">
                            <?= htmlspecialchars($product["title"]) ?>
                        </option>
                    <?php } ?>
                </select>
                <label for="img" class="admin-panel__add-product_label">Выберите новое изображение</label>
                <input class="admin-panel__add-product_field" name="img" type="file"></input>
                <label for="title" class="admin-panel__add-product_label">Напишите новое название товара</label>
                <input class="admin-panel__add-product_field" name="title" type="text"
                    placeholder="Название товара"></input>
                <label for="description" class="admin-panel__add-product_label">Напишите новое описание</label>
                <textarea class="admin-panel__add-product_textarea" name="description"></textarea>
                <button class="admin-panel__add-product_btn" name="update-product">Обновить</button>
            </form>
        </div>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
        }
        ?>
    </section>
</main>

<?php include "footer.php" ?>