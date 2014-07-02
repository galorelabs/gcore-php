<?php
include "../api.php";

//Global Variables
$URL = getURL();
$header = getHeader();

class SalesOrders
{
    public static function _list($params)
    {
        $store_id = $params["store_id"];
        $page = $params["page"];
        $limit = $params["limit"];

        global $URL, $header;
        $list_sales_orders = "/stores/$store_id/sales_orders/?pretty=true";
        $URL = $URL.$list_sales_orders;
        if ($page != null)
        {
        $URL = $URL."&page=$page";
        }
        if ($limit != null)
        {
            $URL = $URL."&limit=$limit";
        }
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
        $list_sales_orders = "/stores/$store_id/sales_orders/$id";
        $URL = $URL.$list_sales_orders;
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
        $update_sales_orders = "/stores/$store_id/sales_orders/$id";
        $URL = $URL.$update_sales_orders;
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
        $post_sales_orders = "/stores/$store_id/sales_orders/";
        $URL = $URL.$post_sales_orders;
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
        //INTENTIONALLY ERROR THE URL DUE TO THE FOLLOWING REASONS:
        // * -- THIS FUNCTION IS NOT IMPLEMENTED
        $delete_sales_orders = "//stores/$store_id/sales_orders/$id";
        $URL = $URL.$delete_sales_orders;
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

//RUNNING COMMAND
//putSalesOrders('100001628');
//SalesOrders::_list(array("store_id" => "plainsandprints", "page" => 1, "limit" => 5));
//SalesOrders::show(array("store_id"=> "cudsly", "id" => 100001628));
//SalesOrders::update(array("store_id"=> "cudsly", "id" => 100001628, "data" => array("flagged"=> true, "status"=> "delivered")));
//SalesOrders::create(array("store_id"=> "cudsly", "data" => array("order_number"=> "999999999", "flagged"=> true, "created_at" => "2014-07-02 08:00:00 UTC", "status"=> "cancelled", "subtotal"=> "5000.00")));
//SalesOrders::delete(array("store_id"=> "cudsly", "id" => 999999999));
?>