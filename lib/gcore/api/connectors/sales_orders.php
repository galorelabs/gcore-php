<?php
include "../api.php";


class SalesOrders extends GCore
{
    protected static function appendURL($params)
    {
        $URL = GCore::getURL();

        if ($params["store_id"] != null)
        {
            //Initial Append of URL
            $store_id = $params["store_id"];
            if ($params["id"] != null)
            {
                $id = $params["id"];
                return $URL."/stores/$store_id/sales_orders/$id";
            }
            else
            {
                $www = $URL."/stores/$store_id/sales_orders/?pretty=true";
                //Checking for Hash
                if ($params["page"] != null || $params["limit"] != null)
                {
                    return GCore::appendHash($www, $params);
                }
                else
                {
                    return $www;
                }
            }
        }
        return null;
    }

    public static function show($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null)
        {
            $results = GCore::runCURL($link, null, null);
        }
        print($results);
    }
    public static function update($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "PUT", $data);
        }
        print($results);
    }
    public static function create($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "POST", $data);
        }
        print($results);
    }
    public static function delete($params, $NOTWorking)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $results = GCore::runCURL($link, "DELETE", null);
        }
        print($results);
    }
}
SalesOrders::show(array("store_id"=> "cudsly"));
?>