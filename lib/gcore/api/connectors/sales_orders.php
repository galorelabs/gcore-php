<?php
include "../api.php";


class SalesOrders extends GCore
{
    public static function show($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null)
        {
            $results = GCore::runCURL($link, null, null);
        }
        print($results);
    }
    public static function update($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "PUT", $data);
        }
        print($results);
    }
    public static function create($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "POST", $data);
        }
        print($results);
    }
    public static function delete($params, $NOTWorking)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $results = GCore::runCURL($link, "DELETE", null);
        }
        print($results);
    }
}?>