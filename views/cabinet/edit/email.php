<?php include ROOT . '/lib/template/header.php'; ?>

                    <?php if ($result): ?>
                    <div class="box success">На Вашу почту было отправлено сообщение с подтверждающей ссылкой!</div>
                    <?php else: ?>
                        <?php if (isset($errors) && is_array($errors)): ?>
                                <?php foreach ($errors as $error): ?>
                                <div class="box fail"><?php echo $error; ?></div>
                                <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                        <form action="#" method="post" class="form">
                            <h2 class="space">Изменить почту</h2>
                            <ul>
                                <li>
                                    <label>Почта:</label>
                                    <input type="text" name="email" class="style1" placeholder="Имя" value="<?php echo $email; ?>"/>
                                </li>
                                <li>
                                    <input type="submit" name="submit" class="button1" value="Сохранить" />
                                </li>
                            </ul>
                        </form>


<?php include ROOT . '/lib/template/footer.php'; ?>