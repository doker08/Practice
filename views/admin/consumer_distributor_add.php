<?php include ROOT . '/lib/template/header.php'; ?>
<?php if($result): ?>
    <div class="box success"><?php echo $result ?></div>
<?php endif;?>
    <form action="#" method="post" class="form">
        <h2 class="space">Добавление заказчика</h2>
        <ul>
            <li><strong>Заказчик: </strong><?php echo $consumer['name'] ?></li>
        </ul>
        <ul>
            <li>
                <label>Поставщик:</label>
                <select class="style1" style="height: 34px;" name="distributor">
                    <?php
                        foreach ($distributors as $distributor){
                            echo"<option value='{$distributor['id']}'>{$distributor['name']}</option>";
                        }
                    ?>
                </select>
            </li>
            <li>
                <input type="hidden" name="consumer" value="<?php echo $consumer['id'] ?>">
                <input type="submit" name="submit" class="button1" value="Отправить" />
            </li>
            <p style="margin-left: 13px"><a href="#" onclick="history.back()">Назад</a></p>
        </ul>
    </form>

<?php include ROOT . '/lib/template/footer.php'; ?>