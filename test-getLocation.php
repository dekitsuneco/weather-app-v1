<?php

$city = $_POST['city'];
$lat = 0;
$lng = 0;

$YOUR_API_KEY = "AIzaSyDMLT9K3WNVqVMC-KvwgXP1YVt90JLoN6c";
// Connect to API and get data:
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=London&key=AIzaSyDMLT9K3WNVqVMC-KvwgXP1YVt90JLoN6c";

$openSession = curl_init();
// Will return the response, if false it print the response:
curl_setopt($openSession, CURLOPT_RETURNTRANSFER, true);
// Set the url:
curl_setopt($openSession, CURLOPT_URL, $url);
// Execute:
$jsonData = curl_exec($openSession);

/*echo curl_error($openSession);
echo '<br \>';
echo curl_errno($openSession);
echo '<br \>';*/
// $result - string, json - $object; $response with 'true' wnen decoding - array.
$response = json_decode($jsonData, true);
//print_r($jsonData); // View JSON
//var_dump($response);

echo $response['results'][0]['geometry']['location']['lat'];
echo '<br \>';
echo $response['results'][0]['geometry']['location']['lng'];

$lat = $response['results'][0]['geometry']['location']['lat'];
$lng = $response['results'][0]['geometry']['location']['lng'];

// Closing:
curl_close($openSession);
?>