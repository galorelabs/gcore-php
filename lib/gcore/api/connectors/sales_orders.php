<?php
include "../api.php";

//Global Variables
$URL = getURL();
$key = getAuth();

function getSalesOrdersAll()
{
    global $URL, $key;
    $list_products = '/stores/plainsandprints/sales_orders?page=1&limit=25';
    $URL = $URL.$list_products;
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result=curl_exec ($ch);
    echo($result);
    curl_close ($ch);
}
function getSalesOrders($id)
{
    //EG: $id = 100001628
    global $URL, $key;
    $list_products = '/stores/plainsandprints/sales_orders/'.$id;
    $URL = $URL.$list_products;
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result=curl_exec ($ch);
    echo($result);
    curl_close ($ch);
}
function putSalesOrders($id)
{
    global $URL, $key;
    $put_products = '/stores/cudsly/sales_orders/'.$id;
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
    $values = array(
        'flagged'=> true,
        'status'=> 'testing'
    );
    $values = json_encode($values,1);
    echo($values);
    $URL = $URL.$put_products;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $values);
    $result=curl_exec ($ch);
    echo($result);
    curl_close ($ch);
}

//RUNNING COMMAND
putSalesOrders('100001628');
?>