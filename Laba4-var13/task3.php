<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подсчёт слов</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        textarea { width: 100%; height: 150px; }
        #output { margin-top: 20px; white-space: pre-wrap; }
    </style>
</head>
<body>

<h2>Введите текст:</h2>
<form method="POST">
    <textarea name="text" id="text"></textarea><br>
    <button type="submit">Посчитать</button>
</form>

<div id="output">
    <?php
    // Включаем отображение ошибок
    ini_set('display_errors', 1);  
    error_reporting(E_ALL);        

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Получаем введённый текст
        $text = isset($_POST['text']) ? trim($_POST['text']) : '';

        // Если текст пустой, выводим сообщение
        if (empty($text)) {
            echo 'Пожалуйста, введите текст!';
        } else {
            // Приводим текст к нижнему регистру для нормализации
            $text = mb_strtolower($text);

            // Регулярное выражение для нахождения всех слов (кириллица и латиница)
            preg_match_all('/\b[а-яёa-z]+\b/u', $text, $matches);

            // Если нет слов, выводим сообщение
            if (empty($matches[0])) {
                echo 'Не найдено слов в тексте!';
            } else {
                // Инициализируем массив для подсчёта слов по первой букве
                $counts = [];

                // Подсчитываем слова по первой букве
                foreach ($matches[0] as $word) {
                    $firstLetter = mb_substr($word, 0, 1);  // Первая буква слова
                    if (!isset($counts[$firstLetter])) {
                        $counts[$firstLetter] = 0;
                    }
                    $counts[$firstLetter]++;
                }

                // Сортируем буквы по алфавиту
                ksort($counts);

                // Выводим результат
                echo "Количество слов на каждую букву:\n";
                foreach ($counts as $letter => $count) {
                    echo strtoupper($letter) . ": " . $count . "\n";
                }
            }
        }
    }
    ?>
</div>

</body>
</html>