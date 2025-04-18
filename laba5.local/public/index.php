<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доска объявлений</title>
</head>
<body>
    <h1>Доска объявлений</h1>
    <form action="index.php" method="post" accept-charset="UTF-8">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="category">Категория:</label>
        <select id="category" name="category" required>
            <option value="Бизнес">Бизнес</option>
            <option value="Оборудование">Оборудование</option>
            <option value="Материалы">Материалы</option>
        </select><br><br>

        <label for="title">Заголовок объявления:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="text">Текст объявления:</label>
        <textarea id="text" name="text" required></textarea><br><br>

        <button type="submit" name="submit">Добавить</button>
    </form>

    <h2>Объявления:</h2>
    <table border="1">
        <tr>
            <th>Категория</th>
            <th>Заголовок</th>
            <th>Текст</th>
        </tr>
        <?php
        $categories = ['Бизнес', 'Оборудование', 'Материалы'];
        foreach ($categories as $category) {
            $dir = "announcements/$category";
            if (is_dir($dir)) {
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        $content = file_get_contents("$dir/$file");
                        $title = pathinfo($file, PATHINFO_FILENAME);
                        echo "<tr>";
                        echo "<td>$category</td>";
                        echo "<td>$title</td>";
                        echo "<td>$content</td>";
                        echo "</tr>";
                    }
                }
            }
        }
        ?>
    </table>

    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $category = $_POST['category'];
        $title = trim($_POST['title']); // Удаляем пробелы в начале и конце
        $text = $_POST['text'];

        // Проверка на пустой заголовок
        if (empty($title)) {
            echo "<script>alert('Заголовок объявления не может быть пустым!');</script>";
        } else {
            $dir = "announcements/$category";
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }

            $filename = "$dir/" . sanitize_filename($title) . ".txt";
            file_put_contents($filename, $text);

            // Перенаправление на главную страницу
            header("Location: index.php");
            exit();
        }
    }

    function sanitize_filename($title) {
        // Удаляем недопустимые символы и заменяем пробелы на подчеркивания
        $title = mb_ereg_replace('[^A-Za-zА-Яа-я0-9_\-]', '_', $title);
        return $title;
    }
    ?>
</body>
</html>