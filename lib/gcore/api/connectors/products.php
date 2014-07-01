<?php

include "../api.php";
//Global Variables
$URL = getURL();
$header = getHeader();

class Products
{

    public static function _list($params)
    {
        $store_id = $params["store_id"];

        global $URL, $header;
        $list_products = "/stores/$store_id/products/";
        $URL = $URL.$list_products;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result=curl_exec ($ch);
        echo($result);
        curl_close ($ch);
    }
    public static function show($params)
    {
        $id = $params["id"];
        $store_id = $params["store_id"];

        global $URL, $header;
        $list_products = "/stores/$store_id/products/$id";
        $URL = $URL.$list_products;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result=curl_exec ($ch);
        echo($result);
        curl_close ($ch);
    }
    public static function putProducts($id)
    {
        //eg: $id = 53b10d03696e64559cf31c00
        global $URL, $key;
        $put_products = "/stores/plainsandprints/products/".$id;
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
    public static function autoPutProducts($id,$arrayObject)
    {
        //eg: $id = 53b10d03696e64559cf31c00
        global $URL, $key;
        $put_products = '/stores/plainsandprints/products/'.$id;
        $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
        $URL = $URL.$put_products;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayObject);
        $result=curl_exec ($ch);
        print($result);
        curl_close ($ch);
    }
    public static function create($params, $attempts = 1){
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
    public static function deleteProducts($id){
        //eg: $id = 53b23cd1696e644411000000
        global $URL, $key;
        $remove_products = '/stores/plainsandprints/products/'.$id;
        $URL = $URL.$remove_products;
        $header = array('Accept'=>'application/json', 'Authorization'=>$key, 'Content-Type'=>'application/json');
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        $result=curl_exec ($ch);
        echo($result);
        curl_close ($ch);
    }

}
//RUNNING COMMANDS
//deleteProducts('53ad4527696e64777e700300'); == ALREADY DELETED
//putProducts('53a8e100696e643e3eeb0200');


//Products::_list();
Products::show(array("id"=>'53a8e100696e643e3eeb0200', "store_id" => "plainsandprints"));
?>