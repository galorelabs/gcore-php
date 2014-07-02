<?php
include "../api.php";


class SalesOrders extends GCore
{
    private static function runCURL($URL, $html, $data)
    {
        $header = GCore::getHeader();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        if ($html != null)
        {
            switch($html)
            {
                case "PUT":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    break;
                case "POST":
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    break;
            }
        }
        $result=curl_exec ($ch);
        echo($result);
        curl_close ($ch);
    }
    private static function appendURL($params)
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
                    return SalesOrders::appendHash($www, $params);
                }
            }
        }
        return null;
    }
    private static function appendJSON($params)
    {
        if ($params["data"] != null)
        {
            return json_encode($params["data"]);
        }
        else
        {
            return null;
        }
    }
    private static function appendHash($URL, $params)
    {
        if ($params["page"] != null)
        {
            $page = $params["page"];
            $URL = $URL."&page=$page";
        }
        if ($params["limit"] != null)
        {
            $limit = $params["limit"];
            $URL = $URL."&limit=$limit";
        }
        return $URL;
    }

    public static function show($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null)
        {
            SalesOrders::runCURL($link, null, null);
        }
    }
    public static function update($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = SalesOrders::appendJSON($params);
            SalesOrders::runCURL($link, "PUT", $data);
        }
    }
    public static function create($params)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = SalesOrders::appendJSON($params);
            SalesOrders::runCURL($link, "POST", $data);
        }
    }
    public static function delete($params, $NOTWorking)
    {
        $link = SalesOrders::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = SalesOrders::appendJSON($params);
            SalesOrders::runCURL($link, "DELETE", null);
        }
    }
}?>