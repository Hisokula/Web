<!doctype html>
<head>
    <meta charset="UTF-8">
    <title> Task 2.2 responded </title>
</head>
<body>
<div>
    <?php
    $_SESSION['surname'] = !empty($_POST['surname']) ? $_POST['surname'] : '';
    $_SESSION['name'] = !empty($_POST['name']) ? $_POST['name'] : '';
    $_SESSION['age'] = !empty($_POST['age']) ? $_POST['age'] : '';
    ?>

    <p>Surname: <?= $_SESSION['surname'] ?></p>
    <p>Name: <?= $_SESSION['name'] ?></p>
    <p>Age: <?= $_SESSION['age'] ?></p>
</div>
</body>