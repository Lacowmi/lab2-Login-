<?php
session_start();
if (!empty($_POST)) {
    require __DIR__ . '/auth.php';

    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (checkAuth($login, $password) || $_SESSION['login'] || $_SESSION['password']) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: /welcome.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}
?>
<html>
<head>
    <title>Авторизация</title>
</head>
<body>
<form action="/login.php" method="post">
    <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
    <br>
    <br>
    <label for="password">Пароль: </label><input type="password" name="password" id="password">
    <br>
    <input type="submit" value="Войти">
</form>
    <?php echo $error; ?>
</body> <br>
</html>
