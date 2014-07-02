<?php
include "../api.php";


class SalesOrders extends GCore
{
    public static function show($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null)
        {
            GCore::runCURL($link, null, null);
        }
    }
    public static function update($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = GCore::appendJSON($params);
            GCore::runCURL($link, "PUT", $data);
        }
    }
    public static function create($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = GCore::appendJSON($params);
            GCore::runCURL($link, "POST", $data);
        }
    }
    public static function delete($params, $NOTWorking)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            GCore::runCURL($link, "DELETE", null);
        }
    }
}?>