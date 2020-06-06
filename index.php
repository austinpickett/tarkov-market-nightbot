<?php
$query = $_GET['q'];
$query = str_replace(' ', '+', $query);
if (empty($query)) {
  echo 'To use market bot type !m <short_name>. No spaces allowed.';
  die;
}

$url = "https://tarkov-market.com/api/v1/item?q=$query";

//  Initiate curl
$ch = curl_init();
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key:b0Awg5B02bx7IOjN',
));

curl_setopt($ch, CURLOPT_URL,$url);
$result = json_decode(curl_exec($ch), true)[0];
curl_close($ch);

print_r($result);


echo $result['name']. ": "  .number_format((int)$result['price']);
