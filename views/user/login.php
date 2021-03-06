<?php include ROOT . '/lib/template/header.php'; ?>

<?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="box fail"><?php echo $error; ?></div>
    <?php endforeach; ?>
<?php endif; ?>

    <form action="#" method="post" class="form">
        <h2 class="space">Вход на сайт</h2>
        <ul>
            <li>
                <label>Почта:</label>
                <input type="email" name="email" class="style1" placeholder="E-mail" value="<?php echo $email; ?>"/>
            </li>
            <li>
                <label>Пароль:</label>
                <input type="password" name="password" class="style1" placeholder="Пароль" value="<?php echo $password; ?>"/>
            </li>
            <?php if (isset($_SESSION['auth_count']) && ($_SESSION['auth_count'] >= 3)):?>
            <li>
                <div class="g-recaptcha" data-sitekey="6Lcw9Q4UAAAAACtXzCrs23p0WnmtIKXokjxW6FwA"></div>
            </li>
            <?php endif; ?>
            <li>
                <input type="submit" name="submit" class="button1" value="Вход" />
            </li>

        </ul>
    </form>

<?php include ROOT . '/lib/template/footer.php'; ?>