<!doctype html>
<html lang = "en">

<head>
    <meta charset = "UTF-8">
    <title> Task 2.3 #2 </title>
</head>

<body>
<div>
    <?php
    $_SESSION['input_data'] = array();
    $_SESSION['input_data'][] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['input_data'][] = !empty($_POST['age']) ? $_POST['age'] : '';
    $_SESSION['input_data'][] = !empty($_POST['salary']) ? $_POST['salary'] : '';
    $_SESSION['input_data'][] = !empty($_POST['fav']) ? $_POST['fav'] : '';
    echo '<ul>';
    foreach ($_SESSION['input_data'] as $val)
    {
        echo '<li>' . $val . '</li>';
    }
    echo '</ul>';
    ?>
</div>
</body>
</html>