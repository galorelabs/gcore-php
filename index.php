<!DOCTYPE html>
<html>
<body>
<?php
$endpoint = 'http://qa.api.gcore.galoretv.com/';
$sales_trend = 'merchant/cudsly/sales_trends/cudsly';
$param = null;
$URL= $endpoint. $sales_trend ."?" . $param;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Authorization: <KEY>', 'Content-type: application/json'));
$result=curl_exec ($ch);
echo $result;
curl_close ($ch);
?>
</body>
</html>

