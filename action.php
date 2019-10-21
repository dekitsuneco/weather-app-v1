<?php 
// Initialize vars:
$API_KEY = "9572fb7849834bb69c16da835b960692";
$city = $_POST['city'];
$coordinates = 0;
$weathers = array (
    'firstDay' => array(
        'description' => '',
        'min' => '',
        'max' => ''
    ), 
    'secondDay' => array(
        'description' => '',
        'min' => '',
        'max' => ''
    ), 
    'thirdDay' => array(
        'description' => '',
        'min' => '',
        'max' => ''
    ), 
    'fourthDay' => array(
        'description' => '',
        'min' => '',
        'max' => ''
    ), 
    'fifthDay' => array(
        'description' => '',
        'min' => '',
        'max' => ''
    )
);
// Connect to API and get data:
$url = "http://api.weatherbit.io/v2.0/forecast/daily?city=Raleigh,NC&key=$API_KEY";

$openSession = curl_init();
// Will return the response, if false it print the response:
curl_setopt($openSession, CURLOPT_RETURNTRANSFER, true);
// Set the url:
curl_setopt($openSession, CURLOPT_URL, $url);
// Execute:
$result = curl_exec($openSession);

// $result - string, json - $object; $json with 'true' wnen decoding - array.
$json = json_decode($result, true);
echo gettype($json);
//print_r($result);

/*if( $result != false && !is_null($json)){
    foreach($json as $k => $e) {
        echo '<p>'  . $e . '</p>';
    }
}*/


//echo $json['data'];
echo $json[0][0][0]['moonrise_ts'];
print_r($json);

// Closing:
curl_close($openSession);
?>