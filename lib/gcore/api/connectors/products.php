<?php

include "../api.php";

//Global Variables
$URL = getURL();
$key = getAuth();

function getProducts()
{
    global $URL, $key;
    $list_products = '/stores/plainsandprints/products?pretty=true';
    $URL = $URL.$list_products;
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$URL);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result=curl_exec ($ch);
    //echo curl_getinfo($ch).'<br/>';
    //echo curl_errno($ch).'<br/>';
    //echo curl_error($ch).'<br/>';
    print($result);
    curl_close ($ch);
}
function putProducts()
{
    global $URL, $key;
    $put_products = '/stores/plainsandprints/products/53b23cd1696e644411000000';
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
    $values = array(
        'apparent_quantity'=>'0',
        'description'=>'Test of Maxi Tan (Intern) at GaloreTV Part 2',
        'group_name'=>null,
        'name'=>'Edit of Maxi',
        'price'=>'500.00',
        'quantity'=>'1',
        'sku'=>'111111111111',
        'status'=>'1',
        'weight'=>'0.0001'
    );
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
    print($result);
    curl_close ($ch);
}
function postProducts(){
    global $URL, $key;
    $post_products = '/stores/plainsandprints/products/';
    $URL = $URL.$post_products;
    $data = array("sku" => "22222222222222", "name" => "Testing A New POST Method by Maxi Tan");
    $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json', 'Content-Length'=>strlen($data));
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result=curl_exec ($ch);
    var_dump($result);
    curl_close ($ch);
}

//RUNNING COMMANDS
postProducts();
?>