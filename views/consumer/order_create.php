<?php include ROOT . '/lib/template/header.php'; ?>

<?php
$sOptions = "";
if(isset($distributorProducts)) {
    foreach ($distributorProducts as $p) {
        $sOptions .= '<option value=' . $p['id'] . '>' . $p['name'] . '</option>';
    }
}
?>
<script>
    function addRow(){
        var table = document.getElementById("table");
        var row = table.insertRow(-1);
        index = table.rows.length - 1;

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);

        cell1.innerHTML =
                "<select class='style1' style='height: 34px;' name='product[]'>" +
                "<?php echo $sOptions ?>" +
                "</select>";

        cell2.innerHTML = "<input type='text'  class='style1' name='count[]'>";
    }
</script>
<?php if (isset($errors) && is_array($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="box fail"><?php echo $error; ?></div>
    <?php endforeach; ?>
<?php endif; ?>
<?php if ($result): ?>
    <div class="box success">Заявка создана!</div>
<?php endif; ?>
        <div class="form">
            <h2 class="space">Создание заявки</h2>
            <ul>
                <li>
                    <form method="post" action="#">
                        <label for="name">Поставщик:</label>
                        <select class="style1" style="height: 34px;" onchange="if (this.selectedIndex) this.form.submit ()" name="distributor">
                            <option>Выбрать</option>
                            <?php foreach ($distributors as $distributor){
                                echo "<option value=\"{$distributor['id']}\">{$distributor['name']}</option>";
                            } ?>
                        </select>
                    </form>
 
                    <form action="#" method="post">
                <li>
                    <label onclick="addRow()"><a>Добавить товар</a></label><br>
                </li>
                    <table width="100%" id="table">
                        <thead>
                        <th width="60%">Наименование</th>
                        <th width="40%">Количество</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><select class='style1' style='height: 34px;' name='product[]'><?php echo $sOptions ?></select></td>
                            <td><input type="text" class="style1" name="count[]"></td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="distributor" value="<?php echo $dist ?>"/>
                </li>
                <li>
                    <input type="submit" name="submit" class="button1" value="Отправить" />
                </li>
            </ul>
        </form>
        </div>

<?php include ROOT . '/lib/template/footer.php'; ?>