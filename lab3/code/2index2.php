<!DOCTYPE html>
<html lang = "ru">

<head>
    <meta charset="UTF-8">
    <title> Task 2.1 </title>
</head>

<body>
    <div>
        <h1> Task 2.1</h1>
        <form method="post">
            <p>
                <label for="text">
                    <textarea name="text_area" rows="10" cols="60"></textarea>
                </label><br>
                <input type="submit" value="Press">
            </p>
        </form>

        <?php
        $input_text = !empty($_POST['text_area']) ? $_POST['text_area'] : '';
        $regular_exp= '/[a-z0-9а-яё.]+/ui';
        $matches = array();
        $count = preg_match_all($regular_exp, $input_text, $matches);

        ?>

        <p>
            <strong> Word count:</strong> <?= $count ?>
            <strong> Text length: </strong> <?= mb_strlen($input_text) ?>
        </p>
    </div>
</body>
</html>