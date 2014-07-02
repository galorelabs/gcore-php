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
    public static function update($params)
    {
        $id = $params["id"];
        $store_id = $params["store_id"];
        $values = json_encode($params["data"]);

        global $URL, $header;
        $put_products = "/stores/$store_id/products/$id";
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
    public static function create($params)
    {

        $store_id = $params["store_id"];
        $values = json_encode($params["data"]);

        global $URL, $header;
        $post_products = "/stores/$store_id/products/";
        $URL = $URL.$post_products;
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $values);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result=curl_exec ($ch);
        echo($result);
        curl_close ($ch);
    }
    public static function delete($params){

        $id = $params["id"];
        $store_id = $params["store_id"];

        global $URL, $header;
        $remove_products = "/stores/$store_id/products/$id";
        $URL = $URL.$remove_products;
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

//Products::_list(array("store_id" => "plainsandprints"));
//Products::show(array("id"=>"<id>", "store_id" => "plainsandprints"));
//Products::create(array("store_id"=> "plainsandprints", "data"=> array("sku"=> "00000000000000", "name"=> "Testing A New POST Method by Maxi Tan")));
//Products::delete(array("id"=>"<id>", "store_id" => "plainsandprints"));
//Products::update(array("id"=>"<id>", "store_id"=> "plainsandprints", "data"=> array("apparent_quantity"=>1, "description"=>"Test of Maxi Tan (Intern) at GaloreTV Part 3", "group_name"=>null, "name"=>"Edit of Maxi", "price"=>"500.00", "quantity"=>"1", "sku"=>"888888888888", "status"=>"1", "weight"=>"0.0001")));
?>