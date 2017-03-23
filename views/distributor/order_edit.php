<?php include ROOT . '/lib/template/header.php'; ?>
<?php if ($result): ?>
    <div class="box success"><?php echo $result ?></div>
<?php endif; ?>
    <form class="form" method="post" action="">
        <h2>Редактирование заявки</h2>
        <p><input type="submit" class="button1" name="submit" value="Сохранить"></p>
        <p><label>Дата поставки: </label><input name="date" type="date" value="<?php echo date("Y-m-d")?>"></p>
        <table width="100%">
            <thead>
            <th width="50%">Наименование</th>
            <th width="25%">Количество</th>
            <th width="25%">Стоимость</th>
            </thead>
            <?php
            foreach ($products as $product) {
                $measure = getMeasure()[$product['measure']];

                echo "<input type='hidden' name='product[]' value='{$product['id']}' />";

                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td><input style='height:25px' name='count[]' type='text' value='{$product['count']}'> {$measure}</input></td>";
                echo "<td><input style='height:25px' name='price[]' type='text' value='{$product['price']}'> грн</input></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="#" onclick="history.back()">Назад</a></p>
    </form>

<?php include ROOT . '/lib/template/footer.php'; ?>