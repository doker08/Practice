<?php include ROOT . '/lib/template/header.php'; ?>

    <script type="text/javascript">
        function ConfirmDelete(id)
        {
            if (confirm("Вы уверены, что хотите удалить?"))
                location.href='/distributor/orders/delete/' + id;
        }
    </script>
    <div class="form">
        <h2>Поставщики</h2>
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
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<a href='/distributor/orders/content/{$order['id']}'><img src='/lib/images/document.png'></a> ";
                echo "<a href='/distributor/orders/edit/{$order['id']}'><img src='/lib/images/pencil.png'></a>";
                echo "<a><img src='/lib/images/trash.png' onclick=\"ConfirmDelete({$order['id']})\">";
                echo "</a></form>";
                echo "<a href='/distributor/orders/delete/{$order['id']}' onClick=\"return confirm(\'Удалить?\');\"></a></td>";
                echo "</tr>";
            }?>
        </table>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>