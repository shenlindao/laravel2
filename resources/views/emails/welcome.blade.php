<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать</title>
</head>
<body>
    <h1>Добрый день, {{ $user->name }}!</h1>
    <p>Спасибо за регистрацию. Ваш адрес электронной почты: {{ $user->email }}</p>
</body>
</html>
