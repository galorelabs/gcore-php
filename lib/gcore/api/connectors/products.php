<?php

include "../api.php";


class Products extends GCore
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
            $store_id = $params["store_id"];
            if ($params["id"] != null)
            {
                $id = $params["id"];
                return $www = $URL."/stores/$store_id/products/$id";
            }
            else
            {
                return $www = $URL."/stores/$store_id/products/";
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

    public static function show($params)
    {
        $link = Products::appendURL($params);
        if ($link != null)
        {
            Products::runCURL($link, null, null);
        }
    }
    public static function update($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = Products::appendJSON($params);
            Products::runCURL($link, "PUT", $data);
        }
    }
    public static function create($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["data"] != null && $params["id"] == null)
        {
            $data = Products::appendJSON($params);
            Products::runCURL($link, "POST", $data);
        }
    }
    public static function delete($params)
    {
        $link = Products::appendURL($params);
        if ($link != null && $params["id"] != null)
        {
            $data = Products::appendJSON($params);
            Products::runCURL($link, "DELETE", null);
        }
    }
}
?>