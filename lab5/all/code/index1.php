<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport"
          content = "width=device-width, user-scalable, initia;-scale=1.0, maximum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <title> Site </title>
</head>
<body>
<div id = "form">
    <form action = "save.php" method = "post">

        <label for = "email">Email</label>
        <input type = "email" name = "email" required>

        <?php
        $categories = scandir('categories');
        echo '<select name="category" required>';
        foreach ($categories as $category)
        {
            if ((is_dir("categories/$category")) && ($category != '.') && ($category != '..'))
            {
                echo "<option value='$category'>$category</option>";
            }
        }
        echo '</select>';
        ?>

        <label for = "title">Title</label>
        <input type = "text" name = "title" required>

        <label for = "description">Description</label>
        <textarea rows = "3" name = "description" required></textarea>

        <input type = "submit" value = "Save">

    </form>
</div>
<div id = "table">
    <table>
        <thead>
        <th>Category</th>
        <th>Title</th>
        <th>Description</th>
        </thead>
        <tbody>
        <?php
        $categoryDir = opendir('categories');
        while ($file = readdir($categoryDir))
        {
            if ((is_dir('categories/'.$file)) && ($file != '.') && ($file != '..'))
            {
                $internalDir = opendir('categories/'.$file);
                while ($add = readdir($internalDir))
                {
                    if ($add != '.' && $add != '..')
                    {
                        $fileTmp = fopen('categories/'.$file.'/'.$add, 'r');
                        $tmp = "";
                        while ($line = fgets($fileTmp))
                        {
                            $tmp .= $line;
                        }
                        fclose($fileTmp);
                        echo '<tr>';
                        echo "<td>$file</td>";
                        echo "<td>".substr($add, 0, strlen($add) - 4)."</td>";
                        echo "<td>$tmp</td>";
                        echo '</tr>';
                    }
                }
            }
        }
        ?>
        </tbody>
    </table>
    <?php

    require_once "vendor/autoload.php";

    use Google\Client;
    use Google\Service\Drive;
    use Google\Service\Sheets\SpreadSheet;

    $apiKey = "AIzaSyCyYRO0DaSwd1RF8m-pp4dJ13y_IfD4uew";
    $clientId = "***";
    $clientSecret = "***";

    $client = new Google_Client();
    $client->setApplicationName("testApplicationName");
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAccessType("offline");
    try {
        $client->setAuthConfig(__DIR__ . "/weblab5-422214-94f4bc6aa30b.json");
    } catch (\Google\Exception $e) {
        echo "<p>Ошибка</p>";
    }
    $client->useApplicationDefaultCredentials();
    $client->addScope('https://www.googleapis.com/auth/spreadsheets');

    $service = new Google_Service_Sheets($client);
    $spreadsheetId = '1ucB_lakmSr89S1LfebLpfGjoW8AS3r8aU1DKqpB3tBI';
    $range = "sheet";
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    try {

        for ($i = 1; $i < sizeof($response->getValues()); $i++) {
            $valuesInRow = array();
            echo "<div>";
            for ($j = 0; $j < 3; $j++) {
                if ($j < sizeof($response->getValues()[$i])) {
                    echo "<p>" . $response->getValues()[$i][$j] . "</p>";
                } else {
                    echo "<p></p>";
                }
            }
            echo "</div>";
        }
    } catch (\Google\Service\Exception $e) {
        echo "Ошибка с получением данных";
    }
    ?>
</div>
</body>
</html>