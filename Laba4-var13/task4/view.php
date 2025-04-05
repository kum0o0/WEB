<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Просмотр данных</title>
</head>
<body>
    <h3>Информация о телефоне:</h3>

    <?php if (isset($_SESSION['phone'])): ?>
        <p><strong>Модель:</strong> <?php echo htmlspecialchars($_SESSION['phone']['model']); ?></p>
        <p><strong>Производитель:</strong> <?php echo htmlspecialchars($_SESSION['phone']['brand']); ?></p>
        <p><strong>Цена:</strong> <?php echo htmlspecialchars($_SESSION['phone']['price']); ?> руб.</p>
    <?php else: ?>
        <p>Нет сохранённых данных. <a href="form.php">Перейти к форме</a></p>
    <?php endif; ?>
</body>
</html>