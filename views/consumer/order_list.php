<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Поставки</h2>
        <table width="100%">
            <thead>
            <th width="70%">Поставщик</th>
            <th width="30%">Дата</th>
            <th width="30%">Сумма</th>
            <th width="30%">Содержимое</th>
            </thead>
            <?php foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>{$order['name']}</td>";
                echo "<td>{$order['date']}</td>";
                echo "<td>{$order['sum']}</td>";
                echo "<td><a href='/consumer/order_content/{$order['id']}'>Просмотреть</a></td>";
                echo "</tr>";
            }?>
        </table>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>