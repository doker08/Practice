<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Заказчики</h2>
        <table width="100%">
            <thead>
            <th width="70%">ФИО</th>
            <th width="30%">Телефон</th>
            </thead>
            <?php foreach ($consumers as $consumer) {
                echo "<tr>";
                echo "<td>{$consumer['name']}</td>";
                echo "<td>{$consumer['phone']}</td>";
                echo "</tr>";
            }?>
        </table>
        <p><a href="#" onclick="history.back()">Назад</a></p>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>