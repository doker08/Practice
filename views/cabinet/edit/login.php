<?php include ROOT . '/lib/template/header.php'; ?>

                    <?php if ($result): ?>
                        <div class="box success">Логин изменен!</div>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                                <?php foreach ($errors as $error): ?>
                                    <div class="box fail"><?php echo $error; ?></div>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                            <form action="#" method="post" class="form">
                                <h2 class="space">Изменить имя</h2>
                                <ul>
                                    <li>
                                        <label>Имя:</label>
                                        <input type="text" name="name" class="style1" placeholder="Имя" value="<?php echo $name ?>"/>
                                    </li>
                                    <li>
                                        <input type="submit" name="submit" class="button1" value="Сохранить" />
                                    </li>
                                </ul>
                            </form>



<?php include ROOT . '/lib/template/footer.php'; ?>