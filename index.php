<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>forms</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/newcss.css">
        <script type="text/javascript" src="scripts/confirm.js"></script>
        <script type="text/javascript" src="scripts/create.js"></script>
        <script type="text/javascript" src="scripts/check.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/style.js"></script>
        <script type="text/javascript" src="scripts/update.js"></script>
        <script type="text/javascript" src="scripts/delete.js"></script>
    </head>
    <body>
        <div class="container mt-4">
            <?php if(isset($_SESSION['username'])) : ?>
            <div>
                <h1>Здравствуйте, <?php echo $_SESSION['username']; ?></h1></br>
                <h3>Зарегистрированно пользователей: <?php echo $_SESSION['count_users']; ?></h3>
                <p>Вам доступно:</p>
                <ul>
                    <li><a href="#form1" id="upd">Редактирование профиля</a></li>
                    <li><a href="#form2" id="dlt">Удаление профиля</a></li>
                </ul>
                <form id="form1"action="php/actions.php" method="POST">
                    <input id="login" type="text" name="new_login" placeholder="Новый логин" class="form-control"
                           pattern="[A-Za-zА-Яа-яЁё0-9]{6,}" required></br>
                    <input id="name" type="text" name="new_name" placeholder="Новое имя" class="form-control"
                           pattern="[A-Za-zА-Яа-яЁё]{6,}" required></br>
                    <input id="email" type="email" name="new_email" placeholder="Новая почта" class="form-control"
                           pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}" required></br>
                    <input id="pass" type="password" name="new_pass" placeholder="Новый пароль" class="form-control"
                           pattern="[A-Za-z0-9]{6,}" required></br>
                    <input id="confirm_pass" type="password" name="new_confirm_pass" placeholder="Подтвердите пароль"
                           class="form-control" pattern="[A-Za-z0-9]{6,}" required></br>
                    <button type="submit" onclick="sendUpdate()">Отправить</button>
                </form>
                <form id="form2"action="php/actions.php" method="POST">
                    <input type="radio" id="del" name="del" class="form-control" value="ok" required>
                    <label for="html">Нажмите ○, чтобы удалить профиль.</label><br>
                    <button type="submit" onclick="sendDelRequest()">Удалить</button>
                </form>
                <form action="php/actions.php" method="POST">
                    <input type="radio" id="out" name="out" class="form-control" value="ok" required>
                                    <label for="html">Нажмите ○, чтобы выйти.</label><br>
                    <button type="submit" onclick="logOut()">Выйти</button>
                </form>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col">
                    <h1>Форма регистрации</h1></br>
                    <form action="php/actions.php" method="POST">
                        <p id="error"></p>
                        <input id="login" type="text" name="login" placeholder="Ваш логин" class="form-control"
                               pattern="[A-Za-zА-Яа-яЁё0-9]{6,}" required></br>
                        <input id="name" type="text" name="name" placeholder="Ваше имя" class="form-control"
                               pattern="[A-Za-zА-Яа-яЁё]{6,}" required></br>
                        <input id="email" type="email" name="email" placeholder="Ваша почта" class="form-control" 
                               pattern="[a-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,4}" required></br>
                        <input id="pass" type="password" name="pass" placeholder="Ваш пароль" class="form-control"
                               pattern="[A-Za-z0-9]{6,}" onkeyup="check()" required></br>
                        <input id="confirm_pass" type="password" name="confirm_pass" placeholder="Подтвердите пароль" 
                               class="form-control" pattern="[A-Za-z0-9]{6,}" onkeyup="check();" required></br>
                        <button type="submit" onclick="sendRequest()">Отправить</button>
                    </form>
                </div>
                <div class="col">
                    <h1>Форма входа</h1></br>
                    <form action="php/actions.php" method="POST">
                        <p id="auth_error"></p>
                        <input id="auth_login" type="text" name="auth_login" placeholder="Ваш логин" class="form-control" 
                               pattern="[A-Za-zА-Яа-яЁё0-9]{6,}" required></br>
                        <input id="auth_pass" type="password" name="auth_pass" placeholder="Ваш пароль" class="form-control"
                               pattern="[A-Za-z0-9]{6,}" required></br>
                        <button type="submit" onclick="sendAuthData()">Войти</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </body>
</html>
