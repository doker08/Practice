<?php include ROOT . '/lib/template/header.php'; ?>

    <script type="text/javascript">
        function ConfirmDelete(id)
        {
            if (confirm("Вы уверенны, что хотите удалить?"))
                location.href='/distributor/products/delete/' + id;
        }
    </script>
    <div class="form">
        <h2>Товары</h2>
        <p>
            <a class="button1" style="font-size: 14px" href="/distributor/products/add/<?php echo $order_id ?>">Добавить</a>
        </p>
        <table width="100%">
            <thead>
            <th width="80%">Название</th>
            <th width="20%">Редактировать</th>
            </thead>
            <?php foreach ($products as $product) {
                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<a href='/distributor/products/edit/{$product['id']}'><img src='/lib/images/pencil.png'></a>";
                echo "<a><img src='/lib/images/trash.png' onclick=\"ConfirmDelete({$product['id']})\">";
                echo "</a></form>";
                echo "<a href='/distributor/products/delete/{$product['id']}' onClick=\"return confirm(\'Удалить?\');\"></a></td>";
                echo "</tr>";
            }?>
        </table>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>