<!DOCTYPE html>
<html>
<body>
<?php
$endpoint = 'http://qa.api.gcore.galoretv.com/';
$sales_trend = 'merchant/cudsly/sales_trends/cudsly';
$list_products = 'stores/plainsandprints/products';
$param = 'page=1';
$URL= $endpoint. $list_products ."?" . $param;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Authorization: <KEY>', 'Content-type: application/json'));
$result=curl_exec ($ch);
$json = json_decode($result, TRUE);
var_dump($json);
curl_close ($ch);
?>
</body>
</html>

