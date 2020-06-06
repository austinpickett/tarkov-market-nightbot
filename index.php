<?php
DEFINE('API_KEY', '...');

$query = htmlspecialchars($_GET['q']);

if (empty($query)) {
  echo 'To use market bot type !m <short_name>. No spaces allowed.';
  die;
}

$url = 'https://tarkov-market.com/api/v1/item?q='. $query;

//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'x-api-key:'.API_KEY,
));

curl_setopt($ch, CURLOPT_URL,$url);
$result = json_decode(curl_exec($ch), true)[0];
curl_close($ch);

if (empty($result['name'])) {
  echo 'Error in name';
  die;
}

echo $result['name']. ": "  .number_format((int)$result['price']);
