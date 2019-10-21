<?php 
// Initialize vars:
$lat = $_GET['lat'];
$lng = $_GET['lng'];
echo $lat . " " . $lng;
$API_KEY = "9572fb7849834bb69c16da835b960692";
$city = $_POST['city'];
$coordinates = 0;
$currentTime = date("Y-m-d");
$nextDay = $currentTime;
$nextDay = date('Y-m-d', strtotime($nextDay . " + 1 days"));

// Connect to API and get data:
$url = "http://api.weatherbit.io/v2.0/forecast/daily?&lat=38.123&lon=-78.543&key=$API_KEY";

$openSession = curl_init();
// Will return the response, if false it print the response:
curl_setopt($openSession, CURLOPT_RETURNTRANSFER, true);
// Set the url:
curl_setopt($openSession, CURLOPT_URL, $url);
// Execute:
$result = curl_exec($openSession);

// $result - string, json - $object; $json with 'true' wnen decoding - array.
$json = json_decode($result, true);
//print_r($result); // View JSON
// var_dump($json);
// echo gettype($json);
//print_r($result);

/*if( $result != false && !is_null($json)){
    foreach($json as $k => $e) {
        echo '<p>'  . $e . '</p>';
    }
}*/


//echo $json['data'];
// echo $json['data'][0]['moonrise_ts'];
// var_dump($json);
// print_r($json);

// Output:
echo $json['data'][0]['min_temp'];
echo '<br \>';
echo $json['data'][0]['max_temp'];
echo '<br \>';
echo $json['data'][0]['weather']['description'];


$weathers = array (
    'firstDay' => array(
        'description' => $json['data'][0]['weather']['description'],
        'min' => $json['data'][0]['min_temp'],
        'max' => $json['data'][0]['max_temp']
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


// Closing:
curl_close($openSession);
?>

<html>
    <head>
    </head>
    <body>
        </p>
        <br />
        <p>Day = <?php echo $currentTime ?>; Weather = <?php echo $json['data'][0]['weather']['description'];?>; Maximum temperature = <?php echo $json['data'][0]['max_temp']; ?>; Minimun temperature = <?php echo $json['data'][0]['min_temp']; ?></p>
        <br />
        <?php $nextDay = date('Y-m-d', strtotime($nextDay . " + 1 days")); ?>
        <p>Day = <?php echo $nextDay ?>; Weather = <?php echo $json['data'][1]['weather']['description'];?>; Maximum temperature = <?php echo $json['data'][1]['max_temp']; ?>; Minimun temperature = <?php echo $json['data'][1]['min_temp']; ?>;</p>
        <br />
        <?php $nextDay = date('Y-m-d', strtotime($nextDay . " + 1 days")); ?>
        <p>Day = <?php echo $nextDay ?>; Weather = <?php echo $json['data'][2]['weather']['description'];?>; Maximum temperature = ; <?php echo $json['data'][2]['max_temp']; ?>Minimun temperature = <?php echo $json['data'][2]['min_temp']; ?>;</p>
        <br />
        <?php $nextDay = date('Y-m-d', strtotime($nextDay . " + 1 days")); ?>
        <p>Day = <?php echo $nextDay ?>; Weather = <?php echo $json['data'][3]['weather']['description'];?>; Maximum temperature = <?php echo $json['data'][3]['max_temp']; ?>; Minimun temperature = <?php echo $json['data'][3]['min_temp']; ?>;</p>
        <br />
        <?php $nextDay = date('Y-m-d', strtotime($nextDay . " + 1 days")); ?>
        <p>Day = <?php echo $nextDay ?>; Weather = <?php echo $json['data'][4]['weather']['description'];?>; Maximum temperature = <?php echo $json['data'][4]['max_temp']; ?>; Minimun temperature = <?php echo $json['data'][4]['min_temp']; ?>;</p>
    </body>
</html>