<?php
$query = $_GET['q'];
$query = str_replace(' ', '+', $query);

if (empty($query)) {
  echo 'To use market bot type !m <short_name>. No spaces allowed.';
  die;
}

$url = 'https://tarkov-market.com/api/v1/item?q='. $query;

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'x-api-key:'.getenv('API_KEY'),
));

curl_setopt($ch, CURLOPT_URL,$url);
$result = json_decode(curl_exec($ch), true)[0];
curl_close($ch);

if (empty($result['name'])) {
  echo 'Error in name';
  die;
}

$name = $result['name'];
$price = number_format((int)$result['price']);
$traderPriceCur = $result['traderPriceCur'];

echo "$name: $price ₽";
