<!DOCTYPE html>
<html>
<body>

<?php
$URL='http://qa.api.gcore.galoretv.com/merchant/cudsly/sales_trends/cudsly';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$URL);
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Authorization: <key>'));
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
$result=curl_exec ($ch);
echo $result;
curl_close ($ch);
?>

</body>
</html>

