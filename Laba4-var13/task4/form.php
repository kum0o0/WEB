<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['phone'] = [
        'model' => $_POST['model'],
        'brand' => $_POST['brand'],
        'price' => $_POST['price']
    ];
    echo "Данные сохранены! <a href='view.php'>Перейти к просмотру</a>";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма телефона</title>
</head>
<body>
    <h3>Введите данные телефона</h3>
    <form method="post">
        Модель: <input type="text" name="model" required><br><br>
        Производитель: <input type="text" name="brand" required><br><br>
        Цена: <input type="number" name="price" required><br><br>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>
