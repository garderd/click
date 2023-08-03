<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/assets/vendor/jquery/jquery-3.7.0.js"></script>
    <script src="/assets/js/script.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Сервис коротких ссылок</title>
</head>
<body>
    <div class="container">
        <form class="link-form" action="/ajax/form_handler.php">
            <div class="link-form__input-wrapper">
                <input class="link-form__text" placeholder="Вставьте ссылку, которую нужно сократить" type="text" name="link">
                <div class="link-form__alarm-text">Введённое значение не является ссылкой</div>
            </div>
            <input class="link-form__button" disabled type="submit" value="Сократить">
        </form>
        <div class="link-short">
            <span class="link-short__result"></span>
        </div>
    </div>
</body>
</html>