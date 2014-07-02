<?php

include "../api.php";


class Products extends GCore
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
                return $URL."/stores/$store_id/products/$id";
            }
            else
            {
                $www = $URL."/stores/$store_id/products/?pretty=true";
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
        $link = Products::appendURL($params);
        if ($link != null)
        {
            $results = GCore::runCURL($link, null, null);
        }
        print($results);
    }
    public static function update($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "PUT", $data);
        }
        print($results);
    }
    public static function create($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = GCore::appendJSON($params);
            $results = GCore::runCURL($link, "POST", $data);
        }
        print($results);
    }
    public static function delete($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $results = GCore::runCURL($link, "DELETE", null);
        }
        print($results);
    }
}
Products::show(array("store_id"=>"plainsandprints", "id"=>"53a954b1696e6460fd040000"));
