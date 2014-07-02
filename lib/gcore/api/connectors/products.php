<?php

include "../api.php";


class Products extends GCore
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
    public static function delete($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            GCore::runCURL($link, "DELETE", null);
        }
    }
}
Products::delete(array("store_id"=>"plainsandprints", "id"=>"53b3d911696e6418f3000000"));
