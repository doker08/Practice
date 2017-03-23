<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Список поставщиков</h2>
        <table>
                <th width="3%">#</th>
                <th width="20%">ФИО</th>
                <th width="20%">Телефон</th>
                <?php foreach ($users as $user){
                    echo "<tr>";
                    echo "<td>{$user['id']}</a>";
                    echo "<td><a href='/admin/user/{$user['id']}'>{$user['name']}</a></td>";
                    echo "<td>{$user['phone']}</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        <p><a href="#" onclick="history.back()">Назад</a></p>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>