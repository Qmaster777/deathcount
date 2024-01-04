<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Простая PHP-страница</title>
</head>
<body>
    <?php
    $file = 'number.txt';

    // Обработка формы при отправке
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Проверка, была ли нажата кнопка +
        if (isset($_POST['plus'])) {
            $number = file_exists($file) ? (int)file_get_contents($file) : 0;
            $number += 1;
            file_put_contents($file, $number);
            header("Location: ".$_SERVER['PHP_SELF']); // Редирект после POST
            exit();
        }
        // Проверка, была ли нажата кнопка -
        elseif (isset($_POST['minus'])) {
            $number = file_exists($file) ? (int)file_get_contents($file) : 0;
            $number -= 1;
            file_put_contents($file, $number);
            header("Location: ".$_SERVER['PHP_SELF']); // Редирект после POST
            exit();
        }
    }

    // Вывод текущего значения
    $number = file_exists($file) ? (int)file_get_contents($file) : 0;
    ?>

    <h1>Число: <?php echo $number; ?></h1>

    <!-- Форма с кнопками +1 и -1 -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="plus" value="+1">
        <input type="submit" name="minus" value="-1">
    </form>
</body>
</html>

