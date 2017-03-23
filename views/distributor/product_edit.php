<?php include ROOT . '/lib/template/header.php'; ?>
<?php if ($result): ?>
    <div class="box success"><?php echo $result ?></div>
<?php endif; ?>

    <form action="#" method="post" class="form">
        <h2 class="space">Редактирование товара</h2>
        <ul>
            <li>
                <label>Название:</label>
                <input type="text" name="name" class="style1" placeholder="Имя" value="<?php echo $product['name']; ?>"/>
            </li>
            <li>
                <label>Измерение:</label>
                <select name="measure" style="height: 35px">
                    <?php
                        $measures = getMeasure();
                        $id = 0;

                        foreach($measures as $measure){
                            echo "<option value='{$id}'>{$measure}</option>";
                            $id++;
                        }
                    ?>
                </select>
            </li>
            <li>
                <input type="submit" name="submit" class="button1" value="Сохранить" />
                <p><a href="#" onclick="history.back()">Назад</a></p>
            </li>
        </ul>
    </form>

<?php include ROOT . '/lib/template/footer.php'; ?>