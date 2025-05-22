<?php
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if ($mysqli->connect_error) {
    die("Ошибка подключения к MySQL: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);

    if ($email && $title && $category) {
        $stmt = $mysqli->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $email, $title, $description, $category);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$ads = [];
$res = $mysqli->query("SELECT * FROM ad ORDER BY created DESC");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $ads[] = $row;
    }
<?php
$mysqli = new mysqli('db', 'root', 'helloworld', 'web');

if ($mysqli->connect_error) {
    die("Ошибка подключения к MySQL: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $title = trim($_POST['title']);
    $category = trim($_POST['category']);
    $description = trim($_POST['description']);

    if ($email && $title && $category) {
        $stmt = $mysqli->prepare("INSERT INTO ad (email, title, description, category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $email, $title, $description, $category);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$ads = [];
$res = $mysqli->query("SELECT * FROM ad ORDER BY created DESC");
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $ads[] = $row;
    }
    $res->free();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Объявления</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .ad { border: 1px solid #ccc; padding: 10px; margin-bottom: 15px; }
    </style>
</head>
<body>
<h2>Добавить объявление</h2>
<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Категория:
    <select name="category" required>
        <option>Одежда</option>
        <option>Обувь</option>
        <option>Аксессуары</option>
    </select><br><br>
    Заголовок: <input type="text" name="title" required><br><br>
    Описание:<br>
    <textarea name="description" rows="6" cols="50"></textarea><br><br>
    <button type="submit">Сохранить</button>
</form>

<h2>Список объявлений</h2>
<?php foreach ($ads as $ad): ?>
    <div class="ad">
        <h3><?= htmlspecialchars($ad['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars($ad['description'])) ?></p>
        <small>
            Категория: <?= htmlspecialchars($ad['category']) ?><br>
            Email: <?= htmlspecialchars($ad['email']) ?>
        </small>
    </div>
<?php endforeach; ?>
</body>
</html>