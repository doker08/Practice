<?php include ROOT . '/lib/template/header.php'; ?>

    <div class="form">
        <h2>Поставщики</h2>
        <table width="100%">
            <thead>
            <th width="70%">ФИО</th>
            <th width="30%">Телефон</th>
            </thead>
            <?php foreach ($distributors as $distributor) {
                echo "<tr>";
                echo "<td>{$distributor['name']}</td>";
                echo "<td>{$distributor['phone']}</td>";
                echo "</tr>";
            }?>
        </table>
    </div>

<?php include ROOT . '/lib/template/footer.php'; ?>