<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Просмотр заявки</h2>
        <table width="100%">
            <thead>
            <th width="40%">Наименование</th>
            <th width="20%">Количество</th>
            <th width="20%">Стоимость</th>
            <th width="20%">Сумма</th>
            </thead>
            <?php
            $global_sum = 0;
            foreach ($products as $product) {
                $sum = $product['count'] * $product['price'];
                $measure = getMeasure()[$product['measure']];
                $global_sum += $sum;

                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>{$product['count']} {$measure}</td>";
                echo "<td><b>{$product['price']}</b> грн</td>";
                echo "<td><b>{$sum}</b> грн</td>";
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td><b>Всего:</b></td>";
            echo "<td></td>";
            echo "<td><b></td>";
            echo "<td><b>{$global_sum}</b> грн</td>";
            echo "</tr>";
            ?>
        </table>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>