<?php
require_once __DIR__ . '/func.php';

$categor = ['Cars', 'Other'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
          content="width=device-width, user-scalable, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task_3</title>
</head>
<body>
<form action="save.php" method="post">
    <label for="email">Email</label>
    <!-- Поле для ввода email -->
    <input type="email" name="email" required>

    <label for="category">Category</label>
    <?php
    // получение списка категорий из директории 'categories'
    $categories = scandir('categories');
    echo '<select name="category" required>';
    // перебор категорий и добавление их в выпадающий список
    foreach ($categories as $category)
    {
        // проверка, что это директория и она не является текущей или родительской директорией
        if ((is_dir("categories/$category")) && ($category != '.') && ($category != '..'))
        {
            echo "<option value='$category'>$category</option>";
        }
    }
    echo '</select>';
    ?>

    <label for="title">Title</label>
    <input type="text" name="title" required>
    <label for="description">Description</label>
    <textarea rows="3" name="description"></textarea>
    <input type="submit" value="Save">
</form>

<div id="table">
    <table>
        <thead>
        <tr>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // подключение к базе данных
        $db = extracted();
        // получение всех записей из таблицы 'web.ad'
        foreach ($db->query("SELECT * FROM web.ad") as $row)
        {
            $category = $row['category'];
            $title = $row['title'];
            $description = $row['description'];
            // вывод записей в таблицу
            echo "<tr><td>" . $category . " </td>";
            echo "<td>" . $title . " </td>";
            echo "<td>" . $description . " </td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
