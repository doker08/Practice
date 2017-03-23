<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Поставщики</h2>
        <p><strong>Заказчик:</strong> <?php echo $consumer['name'] ?></p>
        <p>
            <form action="/admin/consumer/distributor/add/<?php echo $consumer_id ?>" method="post">
                <input type="submit" class="button1" value="Добавить" />
            </form>
        </p>
        <table>
            <th width="3%">#</th>
            <th width="20%">ФИО</th>
            <th width="20%">Телефон</th>
            <?php foreach ($distributors as $distributor){
                echo "<tr>";
                echo "<td>{$distributor['id']}</a>";
                echo "<td><a href='/admin/user/{$distributor['id']}'>{$distributor['name']}</a></td>";
                echo "<td>{$distributor['phone']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <p><a href="#" onclick="history.back()">Назад</a></p>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>