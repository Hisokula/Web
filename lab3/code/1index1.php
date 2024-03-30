<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    function Cube($matcha)
    {
        $num = (int)$matcha[0];
        $cubnum = pow($num, 3);
        return $cubnum;
    }

    echo "<br><b>Task 1A</b></br>";
    $str = 'atd awasb aerb ajdb aoeb';
    $regExp = '/a[a-z]{2}b/';
    $match = [];
    $count = preg_match_all($regExp, $str, $match);
    foreach ($match[0] as &$str)
        echo "<br> $str";
    echo "<br>";

    echo "<br><b>Task 1B</b></br>";
    $str2 = 'a1b2c3';
    $regch = '/[0-9]/ui';
    $result = preg_replace_callback($regch, 'Cube', $str2);
    echo $result;
    ?>
</body>
</html>