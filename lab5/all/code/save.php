<?php
ob_start();
require_once "vendor/autoload.php";

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets\SpreadSheet;

if (empty($_POST['email'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}
$inputData = array();
$inputData[] = !empty($_POST['category']) ? $_POST['category'] : "other";
$inputData[] = $_POST['email'];
$inputData[] = !empty($_POST['title']) ? $_POST['title'] : "untitled";
$inputData[] = $_POST['description'];

$apiKey = "AIzaSyCyYRO0DaSwd1RF8m-pp4dJ13y_IfD4uew";
$clientId = "***";
$clientSecret = "***";

$client = new Google_Client();
$client->setApplicationName("testApplicationName");
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType("offline");
$client->setAuthConfig(__DIR__ . "/weblab5-422214-94f4bc6aa30b.json");
$client->useApplicationDefaultCredentials();
$client->addScope('https://www.googleapis.com/auth/spreadsheets');

$service = new Google_Service_Sheets($client);
$spreadsheetId = '1ucB_lakmSr89S1LfebLpfGjoW8AS3r8aU1DKqpB3tBI';
$range = "sheet";

$values = [[$inputData[0], $inputData[2], $inputData[3], $inputData[1]]];
try {
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $lastRowNumber = sizeof($response->getValues());

    $body = new Google_Service_Sheets_ValueRange(['values' => $values]);
    $options = array('valueInputOption' => 'RAW');

    $service->spreadsheets_values->update($spreadsheetId, 'sheet!A' . ($lastRowNumber + 1), $body, $options);
} catch (\Google\Service\Exception $e) {
    echo "Ошибка с получением данных";
}


header('Location: /');
exit();