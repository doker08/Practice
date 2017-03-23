<?php include ROOT . '/lib/template/header.php'; ?>

                    <?php if ($result): ?>
                        <div class="box success">Пароль изменен!</div>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                                <?php foreach ($errors as $error): ?>
                                <div class="box fail"><?php echo $error; ?></div>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                            <form action="#" method="post" class="form">
                                <h2 class="space">Изменить пароль</h2>
                                <ul>
                                    <li>
                                        <label>Пароль:</label>
                                        <input type="password" name="password" class="style1" placeholder="Пароль" value=""/>
                                    </li>
                                    <li>
                                        <label>Повторите пароль:</label>
                                        <input type="password" name="password2" class="style1" placeholder="Пароль" value=""/>
                                    </li>
                                    <li>
                                    <input type="submit" name="submit" class="button1" value="Сохранить" />
                                    </li>
                                </ul>
                            </form>


<?php include ROOT . '/lib/template/footer.php'; ?>