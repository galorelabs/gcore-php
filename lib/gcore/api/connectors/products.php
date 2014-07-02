<?php

include "../api.php";


class Products extends GCore
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
    public static function delete($params)
    {
        $link = GCore::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $results = GCore::runCURL($link, "DELETE", null);
        }
        print($results);
    }
}
Products::delete(array("store_id"=>"plainsandprints", "id"=>"53b3d911696e6418f3000000"));
